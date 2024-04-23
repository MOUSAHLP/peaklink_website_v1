<?php

namespace App\Livewire\Front\ProductsPage;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class ShowProductsPage extends Component
{
    public function render()
    {
        $products = Product::where('status', 1)->get();
        $categories = ProductCategory::where('status', 1)->get();

        return view(
            'livewire.front.products-page.show-products-page',
            [
                "products" => $products,
                "categories" => $categories,
            ]
        );
    }
}
