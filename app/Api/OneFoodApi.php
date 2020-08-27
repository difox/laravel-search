<?php
/**
 * OneFood API class
 *
 * TODO Make class as a Service Provider
 */
namespace App\Api;

use Illuminate\Support\Facades\Http;

class OneFoodApi
{
    private $host = 'https://world.openfoodfacts.org';

    private $searchUrl = '/cgi/search.pl';

    private $productUrl = '/api/v0/product/{uniqueId}.json';

    private $uniqueField = 'code';

    public function isConnected()
    {
        return Http::get($this->url)->ok();
    }

    /**
     * Get API results by pages
     *
     * @param string $term
     * @param int $pageNum
     * @param int $pageSize
     * @param string $sortBy
     * @return Illuminate\Http\Response
     */
    public function makeSearchRequest(string $term, int $pageNum = 1, int $pageSize = 20, string $sortBy = 'unique_scans_n')
    {
        $response = $this->makeRequest($this->searchUrl, [
            'action' => 'process',
            'search_terms' => $term,
            'sort_by' => $sortBy,
            'page_size' => $pageSize,
            'page' => $pageNum,
            'json' => 1
        ]);

        return $response;
    }

    /**
     * Get product info
     * 
     * @param string $id
     * @return Illuminate\Http\Response
     */
    public function makeProductRequest(string $id)
    {
        if (!$id) {
            abort(404);
        }

        $response = $this->makeRequest(str_replace('{uniqueId}', $id, $this->productUrl));

        return $response;
    }

    private function resolveUrl($uri)
    {
        return $this->host . $uri;
    }

    /**
     *
     * @param type $uri
     * @param type $params
     * @return Illuminate\Http\Response
     */
    private function makeRequest($uri, $params = [])
    {
        $response = Http::get($this->resolveUrl($uri), $params);

        // TODO Log API requests

        return $response;
    }
}