<?php

namespace MicroService\App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use MicroService\App\Models\Items;

class StockResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'item_id' => $this->item_id,
            'quantity' => $this->quantity
        ];
    }
}
