<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MicroService\App\Models\Author;
use Nicolaslopezj\Searchable\SearchableTrait;

class Book extends Model
{
    use HasUuids;
    use SearchableTrait;

    public const RESOURCE_KEY = 'books';

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function books(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
