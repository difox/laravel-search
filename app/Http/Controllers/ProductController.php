<?php

namespace App\Http\Controllers;

use App\Helpers\ProductApiSaver;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
     /**
     * Save or update product from API result.
     *
     * @param  Request  $request
     * @return Response
     */
    public function storeFromApi(Request $request, ProductApiSaver $saver)
    {
        if (!$request->id) {
            abort(404);
        }

        $product = $saver->saveByApiId($request->id);

        return response()->json([
            'message' => $product->wasRecentlyCreated ? 'created' : 'updated'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
