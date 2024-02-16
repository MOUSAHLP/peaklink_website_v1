<?php

namespace App\Livewire\Front\HomePage\ContactUs;

use Livewire\Component;
use App\Models\ContactUsContact;

class ShowContactUs extends Component
{
    public function render()
    {
        $ContactUsContact = ContactUsContact::first();
        return view('livewire.front.home-page.contact-us.show-contact-us',['ContactUsContact'=>$ContactUsContact]);
    }
}
