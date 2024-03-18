<?php

namespace MicroService\App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use MicroService\App\Models\Author;

interface AuthorServiceContract
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
     * @return Author
     */
    public function store(array $payload): Author;

    /**
     * update
     *
     * @param array $payload
     * @param string $authorId
     *
     * @return Author
     */
    public function update(array $payload, string $authorId): Author;

    /**
     * delete
     *
     * @param string $authorId
     *
     * @return Author
     */
    public function delete(string $authorId): Author;

    /**
     * show
     *
     * @param string $authorId
     *
     * @return Author
     */
    public function show(string $authorId): Author;

    /**
     * paginate author
     *
     * @param array $filter
     *
     * @return LengthAwarePaginator
     */
    public function paginateAuthor(array $filter): LengthAwarePaginator;
}
