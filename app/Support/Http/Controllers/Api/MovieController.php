<?php

namespace Ozana\Support\Http\Controllers\Api;

use Illuminate\Http\Request;

use Ozana\Support\Http\Controllers\Controller;
use Ozana\Modules\WatchLists\Movie;

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
