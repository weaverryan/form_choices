<?php

namespace AppBundle\Entity;

class Product
{
    private $name;

    private $category;

    private $stockStatus;

    public function __construct($name = null, Category $category = null)
    {
        $this->name = $name;
        $this->category = $category;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getStockStatus()
    {
        return $this->stockStatus;
    }

    public function setStockStatus($stockStatus)
    {
        $this->stockStatus = $stockStatus;
    }
}
