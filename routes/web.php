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
use App\Livewire\Front\ProjectDetailPage\ShowProjectDetailPage;
use App\Livewire\Front\ProjectPage\ShowProjectsPage;
use App\Livewire\Front\ServiceDetailPage\ShowServiceDetailPage;
use App\Livewire\Front\ServicesPage\ShowServicesPage;
use App\Livewire\Front\TeamDetailPage\ShowTeamDetailPage;
use App\Livewire\Front\TeamPage\ShowTeamPage;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Team;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


Route::group([
    "middleware" => "localization"
], function () {
    Route::get('/', ShowHomePage::class)->name('Home');
    Route::get('/about-us', ShowAboutUsPage::class)->name('aboutUs');
    Route::get('/team', ShowTeamPage::class)->name('team');
    Route::get('/team-detail/{id}', ShowTeamDetailPage::class)->name('teamDetail');
    Route::get('/contact-us', ShowContactUsPage::class)->name('contactUs');
    Route::get('/Projects', ShowProjectsPage::class)->name('Projects');
    Route::get('/Projects/{id}', ShowProjectDetailPage::class)->name('ProjectDetail');
    Route::get('/Posts', ShowPostsPage::class)->name('Posts');
    Route::get('/Posts/{slug}', ShowPostDetailPage::class)->name('PostDetail');
    Route::get('/Posts/categories/{slug}', ShowPostCategoryPage::class)->name('ShowPostCategory');

    Route::get('/services', ShowServicesPage::class)->name('services');
    Route::get('/services/{id}', ShowServiceDetailPage::class)->name('servicesDetail');

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

        $posts = Post::whereHas('categories', function ($query) {
            return $query->where('slug', "رابط القسم2");
        })->get();
        return $posts;
    })->name('a');

    
    Route::get('/qwer', function () {

        return "qwer";
    })->name('qwer');

        Route::post('/qwer', [ContactUsFormController::class, 'save'])->name('qwer');
});
