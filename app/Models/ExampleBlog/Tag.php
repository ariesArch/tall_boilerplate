<?php

namespace App\Models\ExampleBlog;

use App\Support\HasCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use HasCache;
    protected $fillable = ['name'];
}
