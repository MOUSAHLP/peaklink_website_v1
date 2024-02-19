<?php

namespace App\Livewire\Front\AboutUsPage;

use App\Models\AboutUs;
use Livewire\Component;

class ShowAboutUsPage extends Component
{
    public function render()
    {
        $AboutUs = AboutUs::latest()->first();
        return view('livewire.front.about-us-page.show-about-us-page',['AboutUs'=>$AboutUs]);
    }
}
