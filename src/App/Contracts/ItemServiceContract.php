<?php

namespace MicroService\App\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use MicroService\App\Models\Items;

interface ItemServiceContract
{
    /**
     * index
     *
     * @return ResourceCollection
     */
    public function index(): Collection;

    /**
     * paginated ite,
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function paginatedItem(array $filter): LengthAwarePaginator;

    /**
     * store
     *
     * @param array $payload
     *
     * @return Items
     */
    public function store(array $payload): Items;

    /**
     * show
     *
     * @param string $itemId
     *
     * @return Items
     */
    public function show(string $itemId): Items;

    /**
     * update
     *
     * @param array $payload
     * @param string $itemId
     *
     * @return bool
     */
    public function update(array $payload, string $itemId): bool;

    /**
     * delete
     *
     * @param string $itemId
     *
     * @return bool
     */
    public function delete(string $itemId): bool;
}
