<?php

namespace MicroService\App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author_id' => $this->author_id,
            'name' => $this->name,
            'version' => $this->version,
            'description' => $this->description
        ];
    }
}
