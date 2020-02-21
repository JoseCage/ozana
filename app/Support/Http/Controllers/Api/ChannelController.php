<?php

namespace WatchLater\Support\Http\Controllers\Api;

use Illuminate\Http\Request;

use WatchLater\Support\Http\Controllers\Controller;
use WatchLater\Modules\WatchLists\Channel;

class ChannelController extends Controller
{
    public function index(Request $request)
    {
        $channels = Channel::paginate($request->per_page);

        if ($request->has('orderBy')) {
            $channels = Channel::orderBy($request->orderBy, $request->order)->paginate($request->per_page);
        }

        return response()->json($channels);
    }

}
