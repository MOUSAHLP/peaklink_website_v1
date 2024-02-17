<?php

namespace App\Livewire\Front\HomePage\Post;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public function render()
    {
        $Posts = Post::latest()->where('status',1)->get();
        return view('livewire.front.home-page.post.show-post',['Posts'=>$Posts]);
    }
}
