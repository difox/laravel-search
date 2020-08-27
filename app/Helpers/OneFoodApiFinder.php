<?php
/**
 * Class provides OneFood API search functions
 */
namespace App\Helpers;

use App\Api\OneFoodApi;
use Illuminate\Support\Collection;

class OneFoodApiFinder
{
    private $api;

    public function __construct(OneFoodApi $api)
    {
        $this->api = $api;
    }

    /**
     * Find items by product name
     * 
     * @param string|null $search
     * @return Collection
     */
    public function findByProductName(?string $search)
    {
        // Search API results by product name
        if ($search) {
            $items = $this->api
        }

        return new Collection();
    }
}