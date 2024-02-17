<?php

namespace App\Livewire\Front\HomePage\Brand;

use App\Models\Brand;
use Livewire\Component;

class ShowBrand extends Component
{
    public function render()
    {
        $brands = Brand::latest()->where('status',1)->get();
        return view('livewire.front.home-page.brand.show-brand',['brands'=>$brands]);
    }
}
