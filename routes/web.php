<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\FormResponseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', 'home');

Route::name('guest.')->group(function () {
    Route::get('home', [GuestController::class, 'index'])->name('index');
    Route::get('about', [GuestController::class, 'showAboutPage'])->name('about');
    Route::get('contact-us', [GuestController::class, 'showContactPage'])->name('contact');
    Route::get('portfolio', [GuestController::class, 'showPortfolioPage'])->name('portfolio');
    Route::get('blog/posts', [PostsController::class, 'index'])->name('blog');
    Route::get('blog/view/{post}', [PostsController::class, 'show'])->name('blog.view');
    Route::get('privacy-policy', [GuestController::class, 'privacy'])->name('privacy');
    Route::get('terms-conditions', [GuestController::class, 'toc'])->name('toc');
    Route::get('thank-you', [GuestController::class, 'thankYou'])->name('thankYou');
});
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::redirect('gli-admin', 'gli-admin/dashboard');

Route::prefix('gli-admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->name('viewDashboard');
    
    Route::prefix('posts')->group(function () {       
        Route::name('blog.')->group(function () {
            Route::get('/blog', [PostsController::class, 'adminPost'])->name('admin');
            Route::get('/blog/create', [PostsController::class, 'create'])->name('create');
            Route::post('/blog/create', [PostsController::class, 'store'])->name('store');
            Route::get('/blog/{slug}/edit', [PostsController::class, 'edit'])->name('edit');
            Route::post('/blog/{slug}/edit', [PostsController::class, 'update'])->name('update');
            Route::delete('/blog/delete/{slug}', [PostsController::class, 'destroy'])->name('destroy');
        });
        
        Route::name('testimonial.')->group(function () {
            Route::get('/testimonials', [PostsController::class, 'adminTestimonials'])->name('admin');
            Route::get('/testimonials/create', [PostsController::class, 'createTestimonials'])->name('create');
            Route::post('/testimonials/create', [PostsController::class, 'storeTestimonials'])->name('store');
            Route::get('/testimonials/{id}/edit', [PostsController::class, 'editTestimonials'])->name('edit');
            Route::post('/testimonials/{id}/edit', [PostsController::class, 'updateTestimonials'])->name('update');
            Route::delete('/testimonials/delete/{id}', [PostsController::class, 'destroyTestimonials'])->name('destroy');
        });
        Route::name('portfolio.')->group(function () {
            Route::get('/portfolio', [PostsController::class, 'adminPortfolio'])->name('admin');
            Route::get('/portfolio/create', [PostsController::class, 'createPortfolio'])->name('create');
            Route::post('/portfolio/create', [PostsController::class, 'storePortfolio'])->name('store');
            Route::get('/portfolio/{slug}/edit', [PostsController::class, 'editPortfolio'])->name('edit');
            Route::post('/portfolio/{slug}/edit', [PostsController::class, 'updatePortfolio'])->name('update');
            Route::delete('/portfolio/delete/{slug}', [PostsController::class, 'destroyPortfolio'])->name('destroy');
        });
    });

    Route::name('media.')->group(function () {
        Route::get('/media', [MediaController::class, 'index'])->name('admin');
        Route::post('/media', [MediaController::class, 'store'])->name('store');
        Route::delete('/media/{media_name}', [MediaController::class, 'destroyMedia'])->name('destroy');
    });
   
    Route::prefix('site')->group(function () {
        Route::get('/settings', [SiteSettingsController::class, 'index'])->name('settings.admin');
        Route::post('/settings/branding', [SiteSettingsController::class, 'updateBrandImg'])->name('settings.branding.change');
        Route::post('/settings/color', [SiteSettingsController::class, 'updateSiteColor'])->name('settings.color.change');
        
        Route::post('/settings/category', [SiteSettingsController::class, 'storeSubcat'])->name('settings.subcat.new');
        Route::post('/settings/category/{action}', [SiteSettingsController::class, 'updateSubcat'])->name('settings.subcat.update');
        Route::delete('/settings/category/{subcat}', [SiteSettingsController::class, 'destroySubcat'])->name('settings.subcat.destroy');
        
        Route::get('/users', [UserController::class, 'index'])->name('admin.manager');
        Route::get('/users/create', [RegisterController::class, 'showRegisterForm'])->name('showRegisterForm');
        Route::post('/users/create', [RegisterController::class, 'register'])->name('user.register');
        Route::post('/users/edit', [UserController::class, 'update'])->name('user.update');
        Route::post('/users/disable', [UserController::class, 'disable'])->name('user.disable');
    });
    
    
});




Route::post('contact-us/submit-form', [FormResponseController::class, 'sendMessage'])->name('formResponse.sendMessage');
Route::post('submit-form', [FormResponseController::class, 'sendMessage'])->name('submitForm.sendMessage');