<?php

namespace App\Livewire\Front\HomePage\Chooseussection;

use Livewire\Component;
use App\Models\WhyChooseOurService;

class ShowChooseUsSection extends Component
{
    public function render()
    {
        $WhyChooseOurService = WhyChooseOurService::where('status',1)->first();
        return view('livewire.front.home-page.chooseussection.show-choose-us-section',['WhyChooseOurService'=>$WhyChooseOurService]);
    }
}
