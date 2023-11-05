<?php

namespace App\Support;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasPermissions
{
    /**
     * return @MorphMany
     */
    // public function permissions(): MorphMany
    // {
    //     return $this->morphMany(Permission::class, 'modelable');
    // }
    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'model', 'model_has_permissions')->withTimestamps();
    }
}
