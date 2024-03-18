<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nicolaslopezj\Searchable\SearchableTrait;

class Author extends Model
{
    use HasUuids;
    use SearchableTrait;

    public const RESOURCE_KEY = 'authors';

    protected $guarded = [];

    protected $searchable = [
        'columns' => [
            self::RESOURCE_KEY . '.name' => 10,
        ]
    ];

    /**
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
