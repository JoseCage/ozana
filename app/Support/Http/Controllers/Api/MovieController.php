<?php

namespace WatchLater\Support\Http\Controllers\Api;

use Illuminate\Http\Request;

use WatchLater\Support\Http\Controllers\Controller;
use WatchLater\Modules\WatchLists\Movie;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::paginate($request->per_page);

        if ($request->has('orderBy')) {
            $movies = Movie::orderBy($request->orderBy, $request->order)->paginate($request->per_page);
        }

        return response()->json($movies);
    }

}
