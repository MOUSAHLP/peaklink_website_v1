<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsFormRequest;
use App\Models\ContactUsForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactUsFormController extends Controller
{
      private $supported_types = [
        "txt" ,
        "docx" ,
        "xlsx" ,
        "csv",
        "pdf" 
    ];
    function save(ContactUsFormRequest $request) {
        
        $contactUsForm = new ContactUsForm();

        $contactUsForm->name = $request->name;
        $contactUsForm->email = $request->email;
        $contactUsForm->phone = $request->phone;
        $contactUsForm->message = $request->message;

        if($request->file("file")){
            $file_type = $request->file("file")->getClientOriginalExtension();
            
            if(!in_array($file_type, $this->supported_types)){
                return redirect()->back()
                ->withInput($request->all())
                ->withErrors(['file'=> __("home/contact_us.accepted_extensions") . implode(',',$this->supported_types)]);
            }

            $now = Carbon::now()->format("y_m_d_h_i_s");
            $uniqueFileName = uniqid() . $now  . '.' . $file_type;

            $filePath = "contact_us/". $uniqueFileName;

            Storage::disk('public')->put($filePath , file_get_contents($request->file('file')));
            
            $contactUsForm->file = "storage/". $filePath;
        }

            $contactUsForm->save();

        return redirect(url()->previous()."#contact_form")->with('message',  __('home/contact_us.submited'));
    }
}
