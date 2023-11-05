<?php

namespace App\Models;

use App\Support\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Role extends Model
{
    use HasFactory;
    use HasPermissions;
    use HasSlug;
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'model', 'model_has_permissions')->withTimestamps();
    }
}
