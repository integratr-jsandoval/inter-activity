<?php

namespace MicroService\App\Contracts;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use MicroService\App\Models\Items;
use MicroService\App\Models\Stock;

interface StockServiceContract
{
    /**
     * store
     *
     * @param array $payload
     *
     * @return Items
     */
    public function store(array $payload): Stock;
}
