<?php

namespace App\Livewire\Front\HomePage\Pricing;

use App\Models\Pricing;
use Livewire\Component;

class ShowPricing extends Component
{
    public function render()
    {
        $pricings = Pricing::where("status",1)->get();
        return view('livewire.front.home-page.pricing.show-pricing',['pricings'=>$pricings]);
    }
}
