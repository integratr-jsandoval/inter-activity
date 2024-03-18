<?php

namespace MicroService\App\Requests\Authors;

use MicroService\App\Requests\BaseRequest;

class AuthorStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required']
        ];
    }
}
