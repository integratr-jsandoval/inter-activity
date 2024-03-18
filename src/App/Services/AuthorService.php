<?php

namespace MicroService\App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use MicroService\App\Contracts\AuthorServiceContract;
use MicroService\App\Exceptions\Authors\AuthorNotFoundException;
use MicroService\App\Models\Author;
use MicroService\App\Traits\PaginatedTrait;

class AuthorService implements AuthorServiceContract
{
    use PaginatedTrait;

    /**
     * index
     *
     * @return Collection
     */
    public function index(): Collection
    {
        $author = Author::get();
        return $author;
    }

    /**
     * store
     *
     * @param array $payload
     *
     * @return Author
     */
    public function store(array $payload): Author
    {
        $author = Author::create($payload);
        return $author;
    }

    /**
     * update
     *
     * @param array $payload
     * @param string $authorId
     *
     * @return Author
     */
    public function update(array $payload, string $authorId): Author
    {
        $author = $this->findOrFailAuthor($authorId);
        $author->update($payload);
        return $author;
    }

    /**
     * delete
     *
     * @param string $authorId
     *
     * @return Author
     */
    public function delete(string $authorId): Author
    {
        $author = $this->findOrFailAuthor($authorId);
        $author->delete();
        return $author;
    }

    /**
     * find or fail author
     *
     * @param string $itemId
     *
     * @return Author
     */
    public function findOrFailAuthor(string $itemId): Author
    {
        try {
            return Author::findOrFail($itemId);
        } catch (ModelNotFoundException $e) {
            throw new AuthorNotFoundException($e);
        }
    }

    /**
     * show
     *
     * @param string $authorId
     *
     * @return Author
     */
    public function show(string $authorId): Author
    {
        try {
            return Author::where('id', $authorId)
                ->with('books')
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new AuthorNotFoundException($e);
        }
    }

    /**
     * paginate author
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function paginateAuthor(array $filter): LengthAwarePaginator
    {
        $items = Author::query();
        $paginate = $this->paginateBuilder($items, $filter, 10);
        return $paginate;
    }
}
