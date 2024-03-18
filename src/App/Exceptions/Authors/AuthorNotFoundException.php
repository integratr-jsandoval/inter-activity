<?php

namespace MicroService\App\Exceptions\Authors;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorNotFoundException extends Exception
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

        parent::__construct('Author not found.', 404);
    }
}
