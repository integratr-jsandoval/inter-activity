<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    use HasUuids;

    public const RESOURCE_KEY = 'stocks';

    protected $guarded = [];

    protected $fillable = [
        'item_id',
        'quantity'
    ];
}
