<?php

namespace App\Http\Controllers;

use App\Helpers\ProductFinder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, ProductFinder $searcher)
    {
        return view('search', [
            'items' => $searcher->find($request->q),
            'query' => $request->q
        ]);
    }
}
