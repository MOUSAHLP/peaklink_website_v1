<?php

namespace App\Livewire\Front\JoinUsFormPage;

use App\Models\JoinUsPositions;
use Livewire\Component;

class ShowJoinUsFormPage extends Component
{
    public function render()
    {
        $joinUsPositions = JoinUsPositions::where("status", "1")->get();
        return view('livewire.front.join-us-form-page.show-join-us-form-page', compact("joinUsPositions"));
    }
}
