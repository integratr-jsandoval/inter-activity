<?php

namespace MicroService\App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use MicroService\App\Models\Book;

interface BookServiceContract
{
    /**
     * index
     *
     * @return Collection
     */
    public function index(): Collection;

    /**
     * store
     *
     * @param array $payload
     *
     * @return Book
     */
    public function store(array $payload): Book;

    /**
     * paginate books
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function paginateBook(array $filter): LengthAwarePaginator;

    /**
     * delete
     *
     * @param string $bookId
     *
     * @return Book
     */
    public function delete(string $bookId): Book;

    /**
     * show
     *
     * @param string $bookId
     *
     * @return Book
     */
    public function show(string $bookId): Book;

    /**
     * update
     *
     * @param array $payload
     * @param string $bookId
     *
     * @return Book
     */
    public function update(array $payload, string $bookId): Book;
}
