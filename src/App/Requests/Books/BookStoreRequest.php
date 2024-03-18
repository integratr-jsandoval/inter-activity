<?php

namespace MicroService\App\Requests\Books;

use Illuminate\Validation\Rule;
use MicroService\App\Requests\BaseRequest;

class BookStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'author_id' => ['required', Rule::exists('authors', 'id'), 'uuid'],
            'name' => ['required'],
            'version' => ['required'],
            'description' => ['required']
        ];
    }
}
