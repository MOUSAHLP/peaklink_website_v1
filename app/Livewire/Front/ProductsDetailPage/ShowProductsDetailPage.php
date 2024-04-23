<?php

namespace App\Livewire\Front\ProductsDetailPage;

use App\Models\Product;
use Livewire\Component;

class ShowProductsDetailPage extends Component
{
    public Product $product;

    public function mount($slug)
    {
        $product = Product::with("tags")->where("slug", $slug)->where('status', 1)->get()->first();
        if ($product == null) {
            abort(404);
        }
        $this->product = $product;
    }
    public function render()
    {
        $related_products = Product::with("tags")
            ->where("category_id",  $this->product->category->id)
            ->where("id", "!=", $this->product->id)
            ->where('status', 1)->get();

        return view(
            'livewire.front.products-detail-page.show-products-detail-page',
            [
                "product" => $this->product,
                "related_products" => $related_products,
            ]
        );
    }
}
