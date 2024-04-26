<?php

namespace App\Livewire\Front\ContactUsPage;

use Livewire\Component;
use App\Models\ContactUsContact;
use App\Models\Setting;

class ShowContactUsPage extends Component
{
    public function render()
    {
        $ContactUsContact = ContactUsContact::pluck('contacts')->first();
        // $ContactUsSetting_location_map = Setting::pluck('location_map')->first();
        return view('livewire.front.contact-us-page.show-contact-us-page',compact('ContactUsContact'));
    }
}
