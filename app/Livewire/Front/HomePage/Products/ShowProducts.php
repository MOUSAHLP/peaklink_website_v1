<?php

namespace App\Livewire\Front\HomePage\Products;

use App\Models\Product;
use Livewire\Component;

class ShowProducts extends Component
{
    public function render()
    {
        $products = Product::latest()->where('status', 1)->take(5)->get();

        return view(
            'livewire.front.home-page.products.show-products',
            [
                "products" => $products
            ]
        );
    }
}
