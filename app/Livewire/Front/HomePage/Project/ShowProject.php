<?php

namespace App\Livewire\Front\HomePage\Project;

use App\Models\Project;
use Livewire\Component;

class ShowProject extends Component
{
    public function render()
    {
        $Projects = Project::where('status',1)->get();
        return view('livewire.front.home-page.project.show-project',['Projects'=>$Projects]);
    }
}
