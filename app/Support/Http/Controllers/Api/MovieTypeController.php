<?php

namespace Ozana\Support\Http\Controllers\Api;

use Illuminate\Http\Request;

use Ozana\Support\Http\Controllers\Controller;
use Ozana\Modules\WatchLists\MovieType;

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
