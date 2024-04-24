<?php

use App\Enums\IconsEnums;
use App\Http\Controllers\ContactUsFormController;
use App\Livewire\Front\ContactUsPage\ShowContactUsPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Front\HomePage\ShowHomePage;
use App\Livewire\Front\AboutUsPage\ShowAboutUsPage;
use App\Livewire\Front\PostCategoryPage\ShowPostCategoryPage;
use App\Livewire\Front\PostDetailPage\ShowPostDetailPage;
use App\Livewire\Front\PostsPage\ShowPostsPage;
use App\Livewire\Front\ProductsDetailPage\ShowProductsDetailPage;
use App\Livewire\Front\ProductsPage\ShowProductsPage;
use App\Livewire\Front\ProjectDetailPage\ShowProjectDetailPage;
use App\Livewire\Front\ProjectPage\ShowProjectsPage;
use App\Livewire\Front\ServiceDetailPage\ShowServiceDetailPage;
use App\Livewire\Front\ServicesPage\ShowServicesPage;
use App\Livewire\Front\TeamDetailPage\ShowTeamDetailPage;
use App\Livewire\Front\TeamPage\ShowTeamPage;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


Route::group([
    "middleware" => "localization"
], function () {
    Route::get('/', ShowHomePage::class)->name('Home');

    Route::get('/Contact-us', ShowContactUsPage::class)->name('contactUs');

    Route::get('/About-us', ShowAboutUsPage::class)->name('aboutUs');

    Route::get('/Team', ShowTeamPage::class)->name('team');
    Route::get('/Team-detail/{id}', ShowTeamDetailPage::class)->name('teamDetail');

    Route::get('/Projects', ShowProjectsPage::class)->name('Projects');
    Route::get('/Projects/{id}', ShowProjectDetailPage::class)->name('ProjectDetail');

    Route::get('/Posts', ShowPostsPage::class)->name('Posts');
    Route::get('/Posts/{slug}', ShowPostDetailPage::class)->name('PostDetail');
    Route::get('/Posts/categories/{slug}', ShowPostCategoryPage::class)->name('ShowPostCategory');

    Route::get('/Services', ShowServicesPage::class)->name('services');
    Route::get('/Services/{id}', ShowServiceDetailPage::class)->name('servicesDetail');

    Route::get('/Products', ShowProductsPage::class)->name('Products');
    Route::get('/Products/{slug}', ShowProductsDetailPage::class)->name('ProductsDetail');


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

    Route::get('/z', function () {

        $product = Product::with("tags")->where("slug", "alasm")->where('status', 1)->get()->first();

        return $product;
    })->name('a');

    
    Route::get('/qwer', function () {

        return "qwer";
    })->name('qwer');

        Route::post('/qwer', [ContactUsFormController::class, 'save'])->name('qwer');
});
