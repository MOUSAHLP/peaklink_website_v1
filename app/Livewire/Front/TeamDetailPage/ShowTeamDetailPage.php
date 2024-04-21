<?php

namespace App\Livewire\Front\TeamDetailPage;

use App\Models\Team;
use Livewire\Component;

class ShowTeamDetailPage extends Component
{
    public Team $team;

    public function mount($id)
    {
        $this->team = Team::with("detail")->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.front.team-detail-page.show-team-detail-page', ["team" => $this->team]);
    }
}
