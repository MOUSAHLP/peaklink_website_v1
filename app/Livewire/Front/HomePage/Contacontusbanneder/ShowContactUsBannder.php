<?php

namespace App\Livewire\Front\HomePage\Contacontusbanneder;

use App\Models\Setting;
use Livewire\Component;

class ShowContactUsBannder extends Component
{
    public function render()
    {
       $phone = Setting::select("phone")->first()->prefixedPhone;
       
        return view('livewire.front.home-page.contacontusbanneder.show-contact-us-bannder',compact("phone"));
    }
}
