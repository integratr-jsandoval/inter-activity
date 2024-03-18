<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Contracts\AuthorServiceContract;
use MicroService\App\Requests\Authors\AuthorSearchableRequest;
use MicroService\App\Requests\Authors\AuthorStoreRequest;
use MicroService\App\Resources\AuthorResource;

class AuthorController extends BaseController
{
    /**
     * index
     *
     * @param AuthorServiceContract $authorServiceContract
     *
     * @return AnonymousResourceCollection
     */
    public function index(
        AuthorServiceContract $authorServiceContract
    ): AnonymousResourceCollection {
        $book = $authorServiceContract->index();
        return AuthorResource::collection($book);
    }

    /**
     * store
     *
     * @param AuthorServiceContract $authorServiceContract
     * @param AuthorStoreRequest $request
     *
     * @return AuthorResource
     */
    public function store(
        AuthorServiceContract $authorServiceContract,
        AuthorStoreRequest $request
    ): AuthorResource {
        $book = $authorServiceContract->store($request->validated());
        return new AuthorResource($book);
    }

    /**
     * update
     *
     * @param AuthorServiceContract $authorServiceContract
     * @param AuthorStoreRequest $request
     * @param string $authorId
     *
     * @return AuthorResource
     */
    public function update(
        AuthorServiceContract $authorServiceContract,
        AuthorStoreRequest $request,
        string $authorId
    ): AuthorResource {
        $book = $authorServiceContract->update($request->validated(), $authorId);
        return new AuthorResource($book);
    }

    /**
     * delete
     *
     * @param AuthorServiceContract $authorServiceContract
     * @param string $authorId
     *
     * @return JsonResponse
     */
    public function delete(
        AuthorServiceContract $authorServiceContract,
        string $authorId
    ): JsonResponse {
        $authorServiceContract->delete($authorId);
        return response()->json(['message' => 'Author Successfully Deleted!'], 200);
    }

    /**
     * show
     *
     * @param AuthorServiceContract $authorServiceContract
     * @param string $authorId
     *
     * @return AuthorResource
     */
    public function show(
        AuthorServiceContract $authorServiceContract,
        string $authorId
    ): AuthorResource {
        $book = $authorServiceContract->show($authorId);
        return new AuthorResource($book);
    }

    /**
     * paginate author
     *
     * @param AuthorServiceContract $authorServiceContract
     * @param AuthorSearchableRequest $filter
     *
     * @return AnonymousResourceCollection
     */
    public function paginateAuthor(
        AuthorServiceContract $authorServiceContract,
        AuthorSearchableRequest $filter
    ): AnonymousResourceCollection {
        $book = $authorServiceContract->paginateAuthor($filter->validated());
        return AuthorResource::collection($book);
    }
}
