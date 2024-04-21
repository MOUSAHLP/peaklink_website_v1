<?php

namespace App\Livewire\Front\TeamPage;

use App\Models\Team;
use Livewire\Component;

class ShowTeamPage extends Component
{
    public function render()
    {
        $teams = Team::all();
        return view('livewire.front.team-page.show-team-page', ['teams' => $teams]);
    }
}
