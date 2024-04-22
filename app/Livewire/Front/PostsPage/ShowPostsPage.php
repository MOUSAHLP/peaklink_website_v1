<?php

namespace App\Livewire\Front\PostsPage;

use App\Models\BlogCategory;
use App\Models\Post;
use Livewire\Component;

class ShowPostsPage extends Component
{
    public function render()
    {
        $posts = Post::where('status', 1)->get();
        $categories = BlogCategory::all();

        return view('livewire.front.posts-page.show-posts-page', [
            "posts" => $posts,
            "categories" => $categories,
        ]);
    }
}
