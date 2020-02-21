<?php

namespace WatchLater\Support\Http\Controllers\Api;

use Illuminate\Http\Request;

use WatchLater\Support\Http\Controllers\Controller;
use WatchLater\Modules\WatchLists\MovieType;

class MovieTypeController extends Controller
{
    public function index(Request $request)
    {
        // Your index Controller method
        $types = MovieType::paginate($request->per_page);

        if ($request->has('orderBy')) {
            $types = MovieType::orderBy($request->orderBy, $request->order)->paginate($request->per_page);
        }

        return response()->json($types);
    }

}
