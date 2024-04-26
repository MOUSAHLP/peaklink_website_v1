<?php

namespace App\Livewire\Front\ProductForm;

use App\Models\Product;
use Livewire\Component;

class ShowProductFormPage extends Component
{

    public $product_slug;

    public function mount($product_slug = null)
    {
        if ($product_slug != null) {
            $this->product_slug = $product_slug;
        }
    }

    public function render()
    {
        $data['products'] =  Product::where('status',"1")->get();
        $data['product_slug'] =  $this->product_slug ;

        return view('livewire.front.product-form.show-product-form-page' ,$data);
    }
}
