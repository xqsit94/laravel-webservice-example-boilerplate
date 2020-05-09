<?php

namespace App\Traits;


trait CustomModelTrait
{
    public function paginateOrGet($collection)
    {
        if(request()->has('page')) {
            return $collection->paginate();
        }

        return $collection->get();
    }
}