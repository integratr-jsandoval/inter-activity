<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Contracts\BookServiceContract;
use MicroService\App\Requests\Books\BookSearchableRequest;
use MicroService\App\Requests\Books\BookStoreRequest;
use MicroService\App\Resources\BookResource;

class BookController extends BaseController
{
    /**
     * index
     *
     * @param BookServiceContract $bookServiceContract
     *
     * @return AnonymousResourceCollection
     */
    public function index(
        BookServiceContract $bookServiceContract
    ): AnonymousResourceCollection {
        $book = $bookServiceContract->index();
        return BookResource::collection($book);
    }

    /**
     * store
     *
     * @param BookServiceContract $bookServiceContract
     * @param BookStoreRequest $request
     *
     * @return BookResource
     */
    public function store(
        BookServiceContract $bookServiceContract,
        BookStoreRequest $request
    ): BookResource {
        $book = $bookServiceContract->store($request->validated());
        return new BookResource($book);
    }

    /**
     * paginate books
     *
     * @param BookServiceContract $bookServiceContract
     * @param BookSearchableRequest $filter
     *
     * @return AnonymousResourceCollection
     */
    public function paginateBook(
        BookServiceContract $bookServiceContract,
        BookSearchableRequest $filter
    ): AnonymousResourceCollection {
        $book = $bookServiceContract->paginateBook($filter->validated());
        return BookResource::collection($book);
    }

    /**
     * delete
     *
     * @param BookServiceContract $bookServiceContract
     * @param string $bookId
     *
     * @return JsonResponse
     */
    public function delete(
        BookServiceContract $bookServiceContract,
        string $bookId
    ): JsonResponse {
        $bookServiceContract->delete($bookId);
        return response()->json(['message' => 'Book Successfully Deleted!'], 200);
    }

    /**
     * show
     *
     * @param BookServiceContract $bookServiceContract
     * @param string $bookId
     *
     * @return BookResource
     */
    public function show(
        BookServiceContract $bookServiceContract,
        string $bookId
    ): BookResource {
        $book = $bookServiceContract->show($bookId);
        return new BookResource($book);
    }

    /**
     * update
     *
     * @param BookServiceContract $bookServiceContract
     * @param BookStoreRequest $request
     * @param string $bookId
     *
     * @return BookResource
     */
    public function update(
        BookServiceContract $bookServiceContract,
        BookStoreRequest $request,
        string $bookId
    ): BookResource {
        $book = $bookServiceContract->update($request->validated(), $bookId);
        return new BookResource($book);
    }
}
