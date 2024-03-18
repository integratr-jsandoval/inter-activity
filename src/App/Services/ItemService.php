<?php

namespace MicroService\App\Services;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use MicroService\App\Contracts\ItemServiceContract;
use MicroService\App\Exceptions\Items\ItemNotFoundException;
use MicroService\App\Models\Items;
use MicroService\App\Traits\PaginatedTrait;
use PhpParser\Node\Stmt\TryCatch;

class ItemService implements ItemServiceContract
{
    use PaginatedTrait;

    /**
     * index
     *
     * @return Collection
     */
    public function index(): Collection
    {
        $items = Items::get();
        return $items;
    }

    /**
     * paginated item
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function paginatedItem(array $filter): LengthAwarePaginator
    {
        $items = Items::query();
        $paginate = $this->paginateBuilder($items, $filter, 10);
        return $paginate;
    }

    /**
     * show
     *
     * @param string $itemId
     *
     * @return Items
     */
    public function show(string $itemId): Items
    {
        try {
            return Items::with('stock')->findOrFail($itemId);
        } catch (ModelNotFoundException $e) {
            throw new ItemNotFoundException($e);
        }
    }

    /**
     * store
     *
     * @param array $payload
     *
     * @return Items
     */
    public function store(array $payload): Items
    {
        $items = Items::create($payload);
        return $items;
    }

    /**
     * update
     *
     * @param array $payload
     * @param string $itemId
     *
     * @return bool
     */
    public function update(array $payload, string $itemId): Items
    {
        $item = $this->findOrFailItem($itemId);
        $item->update($payload);
        return $item;
    }

    /**
     * delete
     *
     * @param string $itemId
     *
     * @return bool
     */
    public function delete(string $itemId): bool
    {
        $item = $this->findOrFailItem($itemId);
        return $item->delete();
    }

    /**
     * find or fail item
     *
     * @param string $itemId
     *
     * @return Items
     */
    public function findOrFailItem(string $itemId): Items
    {
        try {
            return Items::findOrFail($itemId);
        } catch (ModelNotFoundException $e) {
            throw new ItemNotFoundException($e);
        }
    }
}
