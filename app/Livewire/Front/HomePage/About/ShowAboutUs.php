<?php

namespace App\Livewire\Front\HomePage\About;

use App\Models\AboutUs;
use Livewire\Component;

class ShowAboutUs extends Component
{
    public function render()
    {
        $AboutUs = AboutUs::latest()->first();
        return view('livewire.front.home-page.about.show-about-us',['AboutUs'=>$AboutUs]);
    }
}
