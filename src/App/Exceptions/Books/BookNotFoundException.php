<?php

namespace MicroService\App\Exceptions\Books;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookNotFoundException extends Exception
{
    /**
     * @var ModelNotFoundException
     */
    private ModelNotFoundException $exception;

    /**
     * AssessmentNotFoundException constructor.
     * @param ModelNotFoundException $exception
     */
    public function __construct(ModelNotFoundException $exception)
    {
        $this->exception = $exception;

        parent::__construct('Book not found.', 404);
    }
}
