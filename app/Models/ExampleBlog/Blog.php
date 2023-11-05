<?php

namespace App\Models\ExampleBlog;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    /**
     * Properties to search in table
     * @var string[]     
     */
    const SEARCHABLE = [
        'id',
        'title'
    ];
    /**
     * Properties to filter in table
     * @var string[]     
     */
    const FILTERABLE = [
        'blog_category_id' => null,
        'blog_tags.tag_id' => null,
    ];
    /**
     * Properties to sort in table
     * @var string[]     
     */
    const SORTABLE = [
        'id',
        'title'
    ];
    public $searchable = self::SEARCHABLE;
    public $filterable = self::FILTERABLE;
    public $sortable = self::SORTABLE;
    /**
     * Relationships
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
    public function blogTags() 
    {
        return $this->belongsToMany(Tag::class,'blog_tags');
    }

}
