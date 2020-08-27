<?php

namespace App\Http\Controllers;

use App\Helpers\ProductFinder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function search(Request $request, ProductFinder $searcher)
    {
        $searcher->setCurrentPage($request->page ? $request->page : 1);
        $searcher->setPageSize($request->i ? $request->i : 20);

        $items = $searcher->find($request->q);

        //if ($items->count() > 0) {

            $pagination = new LengthAwarePaginator(
                $items->forPage($searcher->getCurrentPage(), $searcher->getPageSize()),
                $searcher->getTotalCount(),
                $searcher->getPageSize(),
                $searcher->getCurrentPage(),                
                [
                    'path' => url('/search'),
                ]
            );
            $pagination->appends(request()->all());
        //}

        return view('search', [
            'items' => $items,
            'query' => $request->q,
            'pagination' => $pagination,
            'itemsOnRow' => [
                '20' => '20',
                '50' => '50',
                '100' => '100',
                '250' => '250',
                '500' => '500',
                '1000' => '1000'
            ]
        ]);
    }
}
