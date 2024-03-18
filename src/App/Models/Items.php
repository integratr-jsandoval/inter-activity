<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class Items extends Model
{
    use HasUuids;
    use SearchableTrait;

    public const RESOURCE_KEY = 'items';

    protected $guarded = [];

    protected $fillable = [
        'name',
        'price'
    ];

    protected $searchable = [
        'columns' => [
            self::RESOURCE_KEY . '.name' => 10,
        ]
    ];

    /**
     * @return BelongsTo
     */
    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class, 'id', 'item_id');
    }
}
