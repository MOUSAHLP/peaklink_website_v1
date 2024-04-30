<?php

namespace App\Livewire\Front\HomePage\Slider;

use App\Models\Setting;
use Livewire\Component;
use App\Models\SilderPage;

class ShowSlider extends Component
{
    public function render()
    {
        // Get all Sliders for status :1
        $sliders = SilderPage::where('status', 1)->get();
        $socials = Setting::first()->socials;
        return view(
            'livewire.front.home-page.slider.show-slider',
            [
                'sliders' => $sliders,
                'socials' => $socials,
            ]
        );
    }
}
