<?php

namespace MicroService\App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait PaginatedTrait
{
    public function paginateBuilder(Builder $builder, array $payload, $defaultPage = 10)
    {
        if (isset($payload['data'])) {
            $builder->search($payload['data'], null, true, true);
        }

        if (isset($payload['order_by']) && isset($payload['sort_by'])) {
            $builder->orderBy($payload['order_by'], $payload['sort_by']);
        }

        if (isset($payload['per_page'])) {
            $defaultPage = $payload['per_page'];
        }

        $paginated = $builder->paginate($defaultPage)->setPath(
            env('APP_URL') . request()->getRequestUri()
        );

        return $paginated;
    }
}
