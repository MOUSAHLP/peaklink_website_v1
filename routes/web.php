<?php

use App\Enums\IconsEnums;
use App\Http\Controllers\FormController;
use App\Livewire\Front\ContactUsPage\ShowContactUsPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Front\HomePage\ShowHomePage;
use App\Livewire\Front\AboutUsPage\ShowAboutUsPage;
use App\Livewire\Front\PostCategoryPage\ShowPostCategoryPage;
use App\Livewire\Front\PostDetailPage\ShowPostDetailPage;
use App\Livewire\Front\PostsPage\ShowPostsPage;
use App\Livewire\Front\ProductForm\ShowProductFormPage;
use App\Livewire\Front\ProductsDetailPage\ShowProductsDetailPage;
use App\Livewire\Front\ProductsPage\ShowProductsPage;
use App\Livewire\Front\ProjectDetailPage\ShowProjectDetailPage;
use App\Livewire\Front\ProjectPage\ShowProjectsPage;
use App\Livewire\Front\ServiceDetailPage\ShowServiceDetailPage;
use App\Livewire\Front\ServicesPage\ShowServicesPage;
use App\Livewire\Front\TeamDetailPage\ShowTeamDetailPage;
use App\Livewire\Front\TeamPage\ShowTeamPage;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

Route::group([
    "middleware" => "localization"
], function () {
    Route::get('/', ShowHomePage::class)->name('Home');

    Route::get('/Contact-us', ShowContactUsPage::class)->name('contactUs');

    Route::get('/product-form/{product_slug?}', ShowProductFormPage::class)->name('productForm');

    Route::get('/About-us', ShowAboutUsPage::class)->name('aboutUs');

    // Team //
    Route::get('/Team', ShowTeamPage::class)->name('team');
    Route::get('/Team-detail/{id}', ShowTeamDetailPage::class)->name('teamDetail');

    // Projects //
    Route::get('/Projects', ShowProjectsPage::class)->name('Projects');
    Route::get('/Projects/{id}', ShowProjectDetailPage::class)->name('ProjectDetail');

    // Posts //
    Route::get('/Posts', ShowPostsPage::class)->name('Posts');
    Route::get('/Posts/{slug}', ShowPostDetailPage::class)->name('PostDetail');
    Route::get('/Posts/categories/{slug}', ShowPostCategoryPage::class)->name('ShowPostCategory');

    // Services //
    Route::get('/Services', ShowServicesPage::class)->name('services');
    Route::get('/Services/{id}', ShowServiceDetailPage::class)->name('servicesDetail');

    // Products //
    Route::get('/Products', ShowProductsPage::class)->name('Products');
    Route::get('/Products/{slug}', ShowProductsDetailPage::class)->name('ProductsDetail');

    // for save forms
    Route::post('/contact-us-form', [FormController::class, 'save_contact_us_form'])->name('save_contact_us_form');
    Route::post('/product-form', [FormController::class, 'save_product_form'])->name('save_product_form');

    // Catch-all route for 404 errors
    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });


    // For Translating To Arabic
    Route::get('/ar', function (Request $request) {

        Session::put("locale", "ar");
        App::setLocale("ar");

        return redirect()->back();
    })->name('ar');

    // For Translating To English
    Route::get('/en', function () {

        Session::put("locale", "en");
        App::setLocale("en");

        return redirect()->back();
    })->name('en');

    Route::get('/z', function () {
        // Cache::put("setting", "dd", 12425634661);
        $s = Cache::get("setting");
        dd($s);
        return $s;
    })->name('z');
});
