<?php
/**
 * Class provides search products functions.
 */
namespace App\Helpers;

class ProductFinder
{
    private $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    /**
     *
     * @param string|null $productName
     * @return Illuminate\Support\Collection
     */
    public function find(?string $productName)
    {
        return $this->driver->findByProductName($productName);
    }
}