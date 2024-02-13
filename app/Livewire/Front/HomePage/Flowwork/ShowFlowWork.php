<?php

namespace App\Livewire\Front\HomePage\Flowwork;

use Livewire\Component;
use App\Models\FlowWork;

class ShowFlowWork extends Component
{
    public function render()
    {
        $FlowWork = FlowWork::where('status',1)->get();
        return view('livewire.front.home-page.flowwork.show-flow-work',['FlowWork'=>$FlowWork]);
    }
}
