<?php

namespace WatchLater\Support\Http\Controllers\Api;

use Illuminate\Http\Request;

use WatchLater\Support\Http\Controllers\Controller;
use WatchLater\Modules\WatchLists\WatchList;
use Illuminate\Support\Facades\Auth;

class WatchListController extends Controller
{
    public function myList(Request $request)
    {
        $list = WatchList::paginate($request->per_page);

        if ($request->has('orderBy')) {
            $list = WatchList::orderBy($request->orderBy, $request->order)->paginate($request->per_page);
        }

        return response()->json($list);
    }

    public function watchList($watchlist)
    {
        $list = WatchList::with('movies')->find($watchlist);

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

}
