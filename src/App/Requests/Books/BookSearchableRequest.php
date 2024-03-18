<?php

namespace MicroService\App\Requests\Books;

use MicroService\App\Requests\BaseRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use MicroService\App\Models\Book;

class BookSearchableRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'per_page' => ['nullable'],
            'department_filter_id' => ['nullable', 'uuid'],
            'order_by' => ['nullable', Rule::in($this->getColumns())],
            'sort_by' => ['required_with:order_by', 'in:asc,desc'],
            'data' => ['nullable'],
        ];
    }

    public function getColumns()
    {
        $columns = Schema::getColumnListing(Book::RESOURCE_KEY);
        return $columns;
    }
}
