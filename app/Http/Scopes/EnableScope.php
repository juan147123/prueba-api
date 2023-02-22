<?php

namespace App\Http\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EnableScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->where("enable", "=", "1");
    }
}
