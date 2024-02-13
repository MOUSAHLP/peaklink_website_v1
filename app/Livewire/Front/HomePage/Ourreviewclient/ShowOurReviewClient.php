<?php

namespace App\Livewire\Front\HomePage\Ourreviewclient;

use App\Models\OurClientReview;
use Livewire\Component;

class ShowOurReviewClient extends Component
{
    public function render()
    {
        $OurReviewClients = OurClientReview::where('status',1)->get();
        return view('livewire.front.home-page.ourreviewclient.show-our-review-client',['OurReviewClients'=>$OurReviewClients]);
    }
}
