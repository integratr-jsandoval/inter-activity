<?php

namespace MicroService\App\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'date_created' => Carbon::parse($this->created_at)->format('m/d/Y h:i A'),
            // 'quantity' => new StockResource($this->whenLoaded('stock')),
            'stock' =>  $this->whenLoaded('stock', fn () => $this->stock()->select('id', 'quantity')->first())
        ];
    }
}
