<?php

use App\Livewire\Front\ContactUsPage\ShowContactUsPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Front\HomePage\ShowHomePage;
use App\Livewire\Front\AboutUsPage\ShowAboutUsPage;
use App\Livewire\Front\ProjectPage\ShowProjectsPage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


Route::group([
    "middleware" => "localization"
], function () {
    Route::get('/', ShowHomePage::class)->name('Home');
    Route::get('/about-us', ShowAboutUsPage::class)->name('aboutUs');
    Route::get('/contact-us', ShowContactUsPage::class)->name('contactUs');
    Route::get('/Projects', ShowProjectsPage::class)->name('Projects');

    // Catch-all route for 404 errors
    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });


    Route::get('/ar', function (Request $request) {

        Session::put("locale", "ar");
        App::setLocale("ar");

        return redirect()->back();
    })->name('ar');

    Route::get('/en', function () {

        Session::put("locale", "en");
        App::setLocale("en");

        return redirect()->back();
    })->name('en');
});
