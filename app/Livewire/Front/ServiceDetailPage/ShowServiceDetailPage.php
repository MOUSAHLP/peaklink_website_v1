<?php

namespace App\Livewire\Front\ServiceDetailPage;

use App\Models\Service;
use App\Models\ServiceCategory;
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
        $serviceCategories = ServiceCategory::where("status","1")->get();
        return view('livewire.front.service-detail-page.show-service-detail-page',
        [
            'service'=>$this->service,
            "serviceCategories"=>$serviceCategories
         ]);
    }
}
