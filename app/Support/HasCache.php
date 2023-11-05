<?php
namespace App\Support;

use App\Models\ExampleBlog\BlogCategory;
use Illuminate\Support\Facades\Cache;

trait HasCache 
{
    /** @var mixed */
    protected $model;

    /** @var mixed */
    protected $table;

    public function scopeAlwaysCache($query) 
    {
        $this->model = $query->getModel();
        $this->table = $this->model->getTable();
        return Cache::rememberForever($this->table,function() {
            return $this->model::all();
        });
    }
}