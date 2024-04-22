<?php

namespace App\Livewire\Front\ServicesPage;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;

class ShowServicesPage extends Component
{
    public function render()
    {
        $title = "peaklink Services";
        $services = Service::latest()->where('status', 1)->get();
        $categories = ServiceCategory::where('status', 1)->get();
        return view('livewire.front.services-page.show-services-page', compact('services','categories', 'title'));
    }
}
