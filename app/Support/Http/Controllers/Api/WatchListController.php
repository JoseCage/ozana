<?php

namespace Ozana\Support\Http\Controllers\Api;

use Illuminate\Http\Request;

use Ozana\Support\Http\Controllers\Controller;
use Ozana\Modules\WatchLists\WatchList;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class WatchListController extends Controller
{
    public function myList(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $list = WatchList::paginate($request->per_page);

        if ($request->has('orderBy')) {
            $list = WatchList::orderBy($request->orderBy, $request->order)->paginate($request->per_page);
        }

        if ($request->has('public')) {
            $list = WatchList::where('public', $request->public)->orderBy($request->orderBy ?? 'id', $request->order ?? 'desc')->paginate($request->per_page);
        }

        return response()->json($list);
    }

    public function watchList($watchlist)
    {
        $list = WatchList::with('movies')->findOrFail($watchlist);

        return response()->json($list);
    }

    public function addToList(AddWatchListRequest $request)
    {
        $user = Auth::user()->id;

        $watchlist = WatchList::create([
            user_id => $user,
            $request->all()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Item added to your list successfuly',
            'data' => $watchlist
        ]);
    }

    public function publicWatchLists(Request $request)
    {
        $list = WatchList::where('public', true)->paginate($request->per_page);

        if ($request->has('orderBy')) {
            $list = WatchList::where('public', true)->orderBy($request->orderBy, $request->order)->paginate($request->per_page);
        }

        return response()->json($list);
    }

    public function publicWatchList($watchlist)
    {

        $list = WatchList::with('movies')->findOrFail($watchlist);

        return response()->json([
            'data' => [
                $list
            ]
        ]);
    }

}
