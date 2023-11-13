<?php

namespace App\Livewire\Blog;

use App\Models\ExampleBlog\Blog;
use App\Models\ExampleBlog\BlogCategory;
use App\Models\ExampleBlog\Tag;
use App\Utils\Sortable;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use Sortable;
    use WithPagination;
    public array $filterable;
    public array $sortable;
    public string $search = '';
    public $blog_categories = [];
    public $tags = [];
    public $blog_category_filter;
    public $tag_filter;
    public function updatedTagFilter($value)
    {
        if($value == null) return;
        $this->filterable['blog_tags.tag_id'] = json_decode($value)->id;
    }
    public function updatedBlogCategoryFilter($value)
    {
        \Log::info("CategoryFilter: ". $value);
        if ($value == null) return;
        $this->filterable['blog_tags.tag_id'] = json_decode($value)->id;
    }
    /**
     * init data in livewire mount
     */
    public function mount()
    {
        $this->filterable = Blog::FILTERABLE ?? [];
        $this->sortable = Blog::SORTABLE ?? [];
        $this->blog_categories = BlogCategory::alwaysCache();
        $this->tags = Tag::alwaysCache();
    }
    public function render()
    {
        $query = Blog::with('category', 'blogTags')->advancedFilter([
                's'               => $this->search ?: null,
                'f'               => $this->filterable,
                'order_column'    => $this->sortBy,
                'order_direction' => $this->sortDirection,
            ]);
        $blogs = $query->paginate(10);
        return view('livewire.blog.blog-list',compact('blogs'));
    }
}
