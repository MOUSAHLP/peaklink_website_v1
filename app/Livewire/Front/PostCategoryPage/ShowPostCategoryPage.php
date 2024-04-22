<?php

namespace App\Livewire\Front\PostCategoryPage;

use App\Models\BlogCategory;
use App\Models\Post;
use Livewire\Component;

class ShowPostCategoryPage extends Component
{
    public $posts;
    public BlogCategory $category;

    public function mount($slug)
    {
        $this->category = BlogCategory::where('slug', $slug)->get()->first();
        $this->posts = Post::whereHas('categories', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->where('status', 1)->get();
    }
    public function render()
    {
        return view('livewire.front.post-category-page.show-post-category-page', [
            "category" =>  $this->category,
            "posts" =>  $this->posts,
        ]);
    }
}
