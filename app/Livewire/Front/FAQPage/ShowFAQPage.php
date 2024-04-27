<?php

namespace App\Livewire\Front\FAQPage;

use App\Models\Faq;
use Livewire\Component;

class ShowFAQPage extends Component
{
    public function render()
    {
        $faqs = Faq::where("status","1")->orderBy("id","desc")->get();
        return view('livewire.front.faq-page.show-f-a-q-page',compact('faqs'));
    }
}
