<?php

namespace Lunar\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Lunar\Hub\Models\Staff;

class SameStore implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        //only apply scope if logged in user is staff and not admin
        if(auth()->check() && request()->user() instanceof Staff && !request()->user()?->admin){
            $builder->where('store_id', request()->user()?->store_id);
        }
    }
}
