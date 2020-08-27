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
    private $url = 'https://world.openfoodfacts.org/cgi/search.pl';

    public function isConnected()
    {
        return Http::get($this->url)->ok();
    }

    /**
     * Get API results by pages
     *
     * @param int $page Page number
     * @param int $chunk Num items on page
     */
    public function search(string $term, int $page = 1, int $chunk = 20, string $sortBy = 'unique_scans_n')
    {
        $response = Http::get($this->url, [
            'action' => 'process',
            'search_terms' => $term,            
            'sort_by' => $sortBy,
            'page_size' => $chunk,
            'page' => $page,
            'json' => 1
        ]);
    }
}