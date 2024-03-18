<?php

namespace MicroService\App\Exceptions\Items;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemNotFoundException extends Exception
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

        parent::__construct('Item not found.', 404);
    }
}
