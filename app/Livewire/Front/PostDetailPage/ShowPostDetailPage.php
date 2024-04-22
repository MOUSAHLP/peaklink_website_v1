<?php

namespace App\Livewire\Front\PostDetailPage;

use App\Models\BlogCategory;
use App\Models\Post;
use Livewire\Component;

class ShowPostDetailPage extends Component
{
    public Post $post;

    public function mount($slug)
    {
        $post = Post::with(["users", "tags"])->where("slug", $slug)->where('status', 1)->get()->first();
        if ($post == null) {
            abort(404);
        }
        $this->post = $post;
    }
    public function render()
    {
        $latest_posts = Post::with("users")->where("id", "!=", $this->post->id)->where('status', 1)->latest()->take(4)->get();
        $categories = BlogCategory::where("status", 1)->get();

        return view(
            'livewire.front.post-detail-page.show-post-detail-page',
            [
                "post" => $this->post,
                "latest_posts" => $latest_posts,
                "categories" => $categories,
            ]
        );
    }
}
