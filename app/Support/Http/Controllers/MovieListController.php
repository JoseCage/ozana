<?php

namespace Ozana\Support\Http\Controllers;

use Illuminate\Http\Request;

use Ozana\Support\Http\Controllers\Controller;
use Ozana\Modules\WatchLists\MovieWatchList;

class MovieListController extends Controller
{
    public function index(Request $request)
    {
        $movieList = MovieWatchList::paginate($request->per_page);

        if ($request->has('orderBy')) {
            $movieList = MovieWatchList::orderBy($request->orderBy, $request->order)->paginate($request->per_page);
        }

        return response()->json($movieList);
    }

}
