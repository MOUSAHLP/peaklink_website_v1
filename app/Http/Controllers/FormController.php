<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsFormRequest;
use App\Models\ContactUsForm;
use App\Models\JoinUsForm;
use App\Models\ProductForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    private $supported_types = [
        "txt",
        "docx",
        "xlsx",
        "csv",
        "pdf"
    ];
    function save_contact_us_form(ContactUsFormRequest $request)
    {

        $contactUsForm = new ContactUsForm();

        $contactUsForm->name = $request->name;
        $contactUsForm->email = $request->email;
        $contactUsForm->phone = $request->phone;
        $contactUsForm->message = $request->message;

        if ($request->file("file")) {
            $file_type = $request->file("file")->getClientOriginalExtension();

            if (!in_array($file_type, $this->supported_types)) {
                return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors(['file' => __("home/contact_us.accepted_extensions") . implode(',', $this->supported_types)]);
            }

            $now = Carbon::now()->format("y_m_d_h_i_s");
            $uniqueFileName = uniqid() . $now  . '.' . $file_type;

            $filePath = "contact_us/" . $uniqueFileName;

            Storage::disk('public')->put($filePath, file_get_contents($request->file('file')));

            $contactUsForm->file = "storage/" . $filePath;
        }

        $contactUsForm->save();

        return redirect(url()->previous() . "#contact_form")->with('message',  __('home/contact_us.submited'));
    }


    function save_product_form(ContactUsFormRequest $request)
    {
        $productForm = new ProductForm();

        $productForm->product_id = $request->product_id;
        $productForm->name = $request->name;
        $productForm->email = $request->email;
        $productForm->phone = $request->phone;
        $productForm->message = $request->message;

        if ($request->file("file")) {
            $file_type = $request->file("file")->getClientOriginalExtension();

            if (!in_array($file_type, $this->supported_types)) {
                return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors(['file' => __("product_form.accepted_extensions") . implode(',', $this->supported_types)]);
            }

            $now = Carbon::now()->format("y_m_d_h_i_s");
            $uniqueFileName = uniqid() . $now  . '.' . $file_type;

            $filePath = "product_form/" . $uniqueFileName;

            Storage::disk('public')->put($filePath, file_get_contents($request->file('file')));

            $productForm->file = "storage/" . $filePath;
        }

        $productForm->save();

        return redirect()->back()->with('message',  __('product_form.submited'));
    }

    function save_join_us_form(ContactUsFormRequest $request)
    {
        $joinUsForm = new JoinUsForm();

        $joinUsForm->join_us_position_id = $request->join_us_position_id;
        $joinUsForm->full_name = $request->full_name;
        $joinUsForm->email = $request->email;
        $joinUsForm->phone = $request->phone;
        $joinUsForm->message = $request->message;

        if ($request->file("file")) {
            $file_type = $request->file("file")->getClientOriginalExtension();

            if (!in_array($file_type, $this->supported_types)) {
                return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors(['file' => __("join_us.accepted_extensions") . implode(',', $this->supported_types)]);
            }

            $now = Carbon::now()->format("y_m_d_h_i_s");
            $uniqueFileName = uniqid() . $now  . '.' . $file_type;

            $filePath = "join_us/" . $uniqueFileName;

            Storage::disk('public')->put($filePath, file_get_contents($request->file('file')));

            $joinUsForm->file = "storage/" . $filePath;
        }

        $joinUsForm->save();

        return redirect()->back()->with('message',  __('join_us.submited'));
    }
}
