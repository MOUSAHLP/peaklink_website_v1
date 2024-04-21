<?php

namespace App\Livewire\Front\ProjectDetailPage;

use App\Models\Project;
use Livewire\Component;

class ShowProjectDetailPage extends Component
{
    public Project $project;

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);
    }
    public function render()
    {

        $prev_project =  Project::where('id', '<', $this->project->id)->orderBy('id', 'desc')->get()->first();
        if (!isset($prev_project)) {
            $prev_project =  Project::where('id', '!=', $this->project->id)->orderBy('id', 'desc')->latest()->get()->first();
        }
        $next_project =  Project::where('id', '>', $this->project->id)->orderBy('id', 'asc')->get()->first();
        if (!isset($next_project)) {
            $next_project =  Project::where('id', '!=', $this->project->id)->orderBy('id', 'asc')->get()->first();
        }

        $projects = Project::where("id", "!=", $this->project)->latest()->take(5)->get();
        return view(
            'livewire.front.project-detail-page.show-project-detail-page',
            [
                "project" => $this->project,
                "projects" => $projects,
                "next_project" => $next_project->id,
                "prev_project" => $prev_project->id,
            ]
        );
    }
}
