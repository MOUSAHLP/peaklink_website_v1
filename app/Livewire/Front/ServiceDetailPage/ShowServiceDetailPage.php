<?php

namespace App\Livewire\Front\ServiceDetailPage;

use App\Models\Service;
use Livewire\Component;

class ShowServiceDetailPage extends Component
{
    public Service $service;

    public function mount($id)
    {
        $this->service = Service::findOrFail($id);
    }
    
    public function render()
    {
        return view('livewire.front.service-detail-page.show-service-detail-page',['service'=>$this->service]);
    }
}
