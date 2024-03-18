<?php

namespace MicroService\App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use MicroService\App\Contracts\BookServiceContract;
use MicroService\App\Exceptions\Books\BookNotFoundException;
use MicroService\App\Models\Book;
use MicroService\App\Traits\PaginatedTrait;

class BookService implements BookServiceContract
{
    use PaginatedTrait;

    /**
     * index
     *
     * @return Collection
     */
    public function index(): Collection
    {
        $books = Book::get();
        return $books;
    }

    /**
     * store
     *
     * @param array $payload
     *
     * @return Book
     */
    public function store(array $payload): Book
    {
        $books = Book::create($payload);
        return $books;
    }

    /**
     * paginate book
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function paginateBook(array $filter): LengthAwarePaginator
    {
        $items = Book::query();
        $paginate = $this->paginateBuilder($items, $filter, 10);
        return $paginate;
    }

    /**
     * delete
     *
     * @param string $bookId
     *
     * @return Book
     */
    public function delete(string $bookId): Book
    {
        $author = $this->findOrFailBook($bookId);
        $author->delete();
        return $author;
    }

    /**
     * find or fail book
     *
     * @param string $itemId
     *
     * @return Book
     */
    public function findOrFailBook(string $itemId): Book
    {
        try {
            return Book::findOrFail($itemId);
        } catch (ModelNotFoundException $e) {
            throw new BookNotFoundException($e);
        }
    }

    /**
     * show
     *
     * @param string $bookId
     *
     * @return Book
     */
    public function show(string $bookId): Book
    {
        try {
            return $this->findOrFailBook($bookId);
        } catch (ModelNotFoundException $e) {
            throw new BookNotFoundException($e);
        }
    }

    /**
     * update
     *
     * @param array $payload
     * @param string $bookId
     *
     * @return Book
     */
    public function update(array $payload, string $bookId): Book
    {
        $book = $this->findOrFailBook($bookId);
        $book->update($payload);
        return $book;
    }
}
