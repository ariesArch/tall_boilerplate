<?php

namespace App\Support;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasRoles
{
    /**
     * return @MorphToMany
     */
    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles')->withTimestamps();
    }
}
