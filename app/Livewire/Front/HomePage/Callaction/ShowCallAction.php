<?php

namespace App\Livewire\Front\HomePage\Callaction;

use App\Models\CallSection;
use Livewire\Component;

class ShowCallAction extends Component
{
    public function render()
    {
        $callAction = CallSection::where('status',1)->first();
        return view('livewire.front.home-page.callaction.show-call-action',['callAction'=>$callAction]);
    }
}
