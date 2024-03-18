<?php

namespace MicroService\App\Services;

use MicroService\App\Contracts\StockServiceContract;
use MicroService\App\Models\Stock;

class StockService implements StockServiceContract
{
    /**
     * store
     *
     * @param array $payload
     *
     * @return Items
     */
    public function store(array $payload): Stock
    {
        $stock = Stock::create($payload);
        return $stock;
    }
}
