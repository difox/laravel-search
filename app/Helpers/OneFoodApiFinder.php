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

    /**
     * Found products list
     * 
     * @var Illuminate\Support\Collection
     */
    private $products = [];

    /**
     * Current API page
     * 
     * @var int
     */
    private $currentPage = 1;

    /**
     * Total API finded items
     * 
     * @var int
     */
    private $totalCount;

    /**
     * Page size
     * 
     * @var int
     */
    private $pageSize = 20;

    public function __construct(OneFoodApi $api)
    {
        $this->api = $api;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($page)
    {
        $this->currentPage = $page;
    }

    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * Search itemsfor words present in the product name, generic name, brands,
     * categories, origins and labels
     * 
     * @param string|null $search
     * @return Collection
     */
    public function search(?string $search)
    {
        // Search API results
        if ($search) {
            $response = $this->api->makeSearchRequest($search, $this->currentPage, $this->pageSize)
                ->json();

            $this->parseResponse($response);
        }

        return $this->getProducts();
    }

    public function parseResponse($response)
    {
        $this->products = collect($response['products']);
        $this->currentPage = $response['page'];
        $this->totalCount = $response['count'];
    }
}