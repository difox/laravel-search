<?php
namespace App\Helpers;

use App\Product;

/**
 * Class provides methods for save/update Product from API.
 */
class ProductApiSaver
{
    public $api;

    public function __construct($api)
    {
        $this->api = $api;
    }

    public function saveByApiId($id)
    {
        // Get actual item from API
        $response = $this->api->makeProductRequest($id)->json();
        $item = $response['product'];

        return Product::updateOrCreate(['id' => $id], [
            'product_name' => $item['product_name'] ?: '',
            'categories' => $item['categories'] ?: '',
            'image_url' => $item['image_url'] ?: '',
        ]);
    }
}