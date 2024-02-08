<?php

namespace App\Livewire\Front\HomePage\Services;

use App\Models\Service;
use Livewire\Component;

class ShowServices extends Component
{
    public function render()
    {
        $services = Service::latest()->where('status',1)->take(4)->get();
        return view('livewire.front.home-page.services.show-services',['services'=>$services]);
    }
}
