<?php

namespace MicroService\App\Requests\stocks;

use Illuminate\Validation\Rule;
use MicroService\App\Requests\BaseRequest;

class StockStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'item_id' => ['required', Rule::exists('items', 'id'), Rule::unique('stocks', 'item_id'), 'uuid'],
            'quantity' => ['required', 'numeric']
        ];
    }
}
