<?php

namespace App\Facades;

use App\Event;
use App\Traits\CustomModelTrait;

class EventFacade
{
    use CustomModelTrait;

    public function listFilter()
    {
        $events = new Event;

        // Todo: Add Filter and Search

        $queries = request()->has('query') ? json_decode(request()->input('query')) : [];

        foreach ($queries as $field => $query) {
            if (is_string($query)) {
                $events = $events->where($field, 'LIKE', "%{$query}%");
            }
        }

        if(request()->has('orderBy')) {
            $direction = request()->ascending === 'true' ? 'ASC' : 'DESC';
            $events = $events->orderBy(request()->orderBy, $direction);
        }

        return $this->paginateOrGet($events);
    }
}