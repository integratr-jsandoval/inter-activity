<?php

namespace MicroService\App\Requests\items;

use MicroService\App\Requests\BaseRequest;

class ItemStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'price' => ['required', 'numeric']
        ];
    }
}
