<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use MicroService\App\Contracts\ItemServiceContract;
use MicroService\App\Http\Controllers\Controller;
use MicroService\App\Requests\Items\ItemSearchableRequest;
use MicroService\App\Requests\items\ItemStoreRequest;
use MicroService\App\Resources\ItemResource;

class ItemController extends Controller
{
    /**
     * index
     *
     * @param ItemServiceContract $itemServiceContract
     *
     * @return AnonymousResourceCollection
     */
    public function index(
        ItemServiceContract $itemServiceContract
    ): AnonymousResourceCollection {
        $item = $itemServiceContract->index();
        return ItemResource::collection($item);
    }

    /**
     * paginated Item
     *
     * @param ItemServiceContract $itemServiceContract
     * @param ItemSearchableRequest $filter
     *
     * @return AnonymousResourceCollection
     */
    public function paginatedItem(
        ItemServiceContract $itemServiceContract,
        ItemSearchableRequest $filter
    ): AnonymousResourceCollection {
        $item = $itemServiceContract->paginatedItem($filter->validated());
        return ItemResource::collection($item);
    }

    /**
     * store
     *
     * @param ItemServiceContract $itemServiceContract
     * @param ItemStoreRequest $request
     *
     * @return ItemResource
     */
    public function store(
        ItemServiceContract $itemServiceContract,
        ItemStoreRequest $request
    ): ItemResource {
        $item = $itemServiceContract->store($request->validated());
        return new ItemResource($item);
    }

    /**
     * show
     *
     * @param ItemServiceContract $itemServiceContract
     * @param string $itemId
     *
     * @return ItemResource
     */
    public function show(
        ItemServiceContract $itemServiceContract,
        string $itemId
    ): ItemResource {
        $item = $itemServiceContract->show($itemId);
        return new ItemResource($item);
    }

    /**
     * update
     *
     * @param ItemServiceContract $itemServiceContract
     * @param ItemStoreRequest $request
     * @param string $itemId
     *
     * @return ItemResource
     */
    public function update(
        ItemServiceContract $itemServiceContract,
        ItemStoreRequest $request,
        string $itemId
    ): ItemResource {
        $item = $itemServiceContract->update($request->validated(), $itemId);
        return new ItemResource($item);
    }

    /**
     * delete
     *
     * @param ItemServiceContract $itemServiceContract
     * @param string $itemId
     *
     * @return void
     */
    public function delete(
        ItemServiceContract $itemServiceContract,
        string $itemId
    ): JsonResponse {
        $itemServiceContract->delete($itemId);
        return response()->json(['message' => 'Item Successfully Deleted!'], 200);
    }
}
