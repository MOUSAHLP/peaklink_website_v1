<?php

namespace App\Livewire\Front\ProjectPage;

use App\Models\CategoryProject;
use App\Models\Project;
use Livewire\Component;

class ShowProjectsPage extends Component
{
    public function render()
    {
        $title = "peaklink projects";
        $categories = CategoryProject::where('status', 1)->get();
        $projects = Project::latest()->where('status', 1)->get();
        return view('livewire.front.project-page.show-projects-page', compact('projects', 'title', 'categories'));
    }
}
