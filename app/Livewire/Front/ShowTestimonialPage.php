<?php

namespace App\Livewire\Front;

use App\Models\OurClientReview;
use Livewire\Component;

class ShowTestimonialPage extends Component
{
    public function render()
    {
        $testimonials = OurClientReview::where("status","1")->orderBy("stars","desc")->get();
        return view('livewire.front.show-testimonial-page',compact("testimonials"));
    }
}
