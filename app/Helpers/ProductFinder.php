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
        return $this->driver->search($productName);
    }

    public function getTotalCount()
    {
        return $this->driver->getTotalCount();
    }

    public function getPageSize()
    {
        return $this->driver->getPageSize();
    }

    public function setPageSize($pageSize)
    {
        return $this->driver->setPageSize($pageSize);
    }

    public function getCurrentPage()
    {
        return $this->driver->getCurrentPage();
    }

    public function setCurrentPage($page)
    {
        $this->driver->setCurrentPage($page);
    }
}