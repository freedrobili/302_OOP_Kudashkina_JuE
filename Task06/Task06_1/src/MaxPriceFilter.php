<?php

namespace App;

class MaxPriceFilter implements ProductFilteringStrategy
{
    private $maxPrice;

    public function __construct($maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }
    // ===================================
    //@TODO Реализовать стратегию фильтрации по цене товара
    // ===================================
    public function filter(Product $product): bool
    {
        return $this->maxPrice >= $product->sellingPrice;
    }
}
