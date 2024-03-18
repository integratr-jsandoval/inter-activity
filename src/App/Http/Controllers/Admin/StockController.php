<?php

namespace MicroService\App\Http\Controllers\Admin;

use MicroService\App\Contracts\StockServiceContract;
use MicroService\App\Http\Controllers\Controller;
use MicroService\App\Requests\stocks\StockStoreRequest;
use MicroService\App\Resources\StockResource;

class StockController extends Controller
{
    public function store(
        StockServiceContract $stockServiceContract,
        StockStoreRequest $request,
    ) {
        $stock = $stockServiceContract->store($request->validated());
        return new StockResource($stock);
    }

    public function update()
    {
        //
    }
}
