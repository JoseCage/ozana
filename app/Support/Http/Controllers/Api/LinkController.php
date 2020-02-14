<?php

namespace WatchLater\Support\Http\Controllers\Api;

use Illuminate\Http\Request;

use WatchLater\Support\Http\Controllers\Controller;
use WatchLater\Modules\Links\Link;
use WatchLater\Modules\WatchLists\WatchList;
use WatchLater\Services\PublicLinkService;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $links = Link::paginate($request->per_page);

        if ($request->has('orderBy')) {
            $links = Link::orderBy($request->orderBy, $request->order)->paginate($request->per_page);
        }

        return response()->json($links);
    }

    public function generateLink($watchlist, Request $request)
    {
        return PublicLinkService::generate($watchlist, $request->public);

        // if ($link) {
        //     return response()->json([
        //         'data' => $link
        //     ]);
        // }
    }

    public function redirectToList(Request $request)
    {
        $url = $request->fullUrl();

        $sharedLink = Link::where('url', $url)->first();

        $list = WatchList::find($sharedLink->watchlist_id);

        //dd($list);

        return redirect(config('app.url') . '/api/watchlists/' . $list->id);
    }

}