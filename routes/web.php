<?php

use App\Livewire\Front\ContactUsPage\ShowContactUsPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Front\HomePage\ShowHomePage;
use App\Livewire\Front\AboutUsPage\ShowAboutUsPage;
use App\Livewire\Front\ProjectPage\ShowProjectsPage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ShowHomePage::class )->name('Home');
Route::get('/about-us', ShowAboutUsPage::class )->name('aboutUs');
Route::get('/contact-us', ShowContactUsPage::class )->name('contactUs');
Route::get('/Projects', ShowProjectsPage::class )->name('Projects');

// Catch-all route for 404 errors
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});