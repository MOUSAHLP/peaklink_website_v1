<?php

namespace App\Livewire\Front\ProjectPage;

use App\Models\Project;
use Livewire\Component;

class ShowProjectsPage extends Component
{
    public function render()
    { 
        $projects = Project::latest()->where('status',1)->get();
        return view('livewire.front.project-page.show-projects-page',compact('projects'));
    }
}
