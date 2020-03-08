<?php

namespace Ozana\Support\Http\Controllers;

use Illuminate\Http\Request;

use Ozana\Support\Http\Controllers\Controller;
use Ozana\Modules\WatchLists\WatchList;
use Illuminate\Support\Facades\Auth;
use Ozana\Units\Core\Http\Requests\AddWatchListRequest;

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
