<?php

namespace App\Livewire\Front\HomePage\Faqs;

use App\Models\Faq;
use Livewire\Component;

class Showfaq extends Component
{
    public function render()
    {
        $Faqs = Faq::latest()->where('status',1)->orderBy("id","desc")->get()->take(5);
        return view('livewire.front.home-page.faqs.showfaq',['Faqs'=>$Faqs]);;
    }
}
