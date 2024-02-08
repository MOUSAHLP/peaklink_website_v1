<?php

namespace App\Livewire\Front\HomePage\Slider;

use Livewire\Component;
use App\Models\SilderPage;

class ShowSlider extends Component
{
    public function render()
    {
        // Get all Sliders for status :1
        $sliders = SilderPage::latest()->where('status',1)->get();
        return view('livewire.front.home-page.slider.show-slider',['sliders'=>$sliders]);
    }
}
