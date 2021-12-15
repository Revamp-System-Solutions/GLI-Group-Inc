<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SiteSettingsController;

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

// Route::resource('home', GuestController::class);
Route::get('home', [GuestController::class, 'index'])->name('guest.index');
Route::get('home#designstudio', [GuestController::class, 'index'])->name('guest.studio');
Route::get('home#modularcabinets', [GuestController::class, 'index'])->name('guest.modcabinet');
Route::get('home#builders', [GuestController::class, 'index'])->name('guest.builders');
Route::get('about', [GuestController::class, 'showAboutPage'])->name('guest.about');
Route::get('contact-us', [GuestController::class, 'showContactPage'])->name('guest.contact');
Route::get('portfolio', [GuestController::class, 'showPortfolioPage'])->name('guest.portfolio');
Route::get('blog/posts', [PostsController::class, 'index'])->name('guest.blog');
Route::get('blog/view/{post}', [PostsController::class, 'show'])->name('guest.blog.view');

Route::redirect('gli-admin', 'gli-admin/dashboard');

Route::get('gli-admin/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm')->middleware('guest');
Route::post('gli-admin/login', [LoginController::class, 'authenticate'])->name('login');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('gli-admin/dashboard', [DashboardController::class, 'viewDashboard'])->name('viewDashboard');
Route::get('gli-admin/posts', [PostsController::class, 'adminPost'])->name('adminPost');
Route::get('gli-admin/posts/create', [PostsController::class, 'create'])->name('post.create');
Route::post('gli-admin/posts/create', [PostsController::class, 'store'])->name('post.store');
Route::get('gli-admin/posts/edit/{slug}', [PostsController::class, 'edit'])->name('post.edit');
Route::post('gli-admin/posts/edit/{slug}', [PostsController::class, 'update'])->name('post.update');
Route::delete('gli-admin/posts/delete/{slug}', [PostsController::class, 'destroy'])->name('post.destroy');

Route::get('gli-admin/media', [MediaController::class, 'index'])->name('admin.media');
Route::post('gli-admin/media/', [MediaController::class, 'store'])->name('media.store');
Route::delete('gli-admin/media/{media_name}', [MediaController::class, 'destroyMedia'])->name('media.destroy');

Route::get('gli-admin/site/settings', [SiteSettingsController::class, 'index'])->name('admin.settings');
Route::post('gli-admin/site/settings/branding', [SiteSettingsController::class, 'updateBrandImg'])->name('settings.branding.change');
Route::post('gli-admin/site/settings', [SiteSettingsController::class, 'updateSiteColor'])->name('settings.color.change');

Route::post('gli-admin/site/settings/category', [SiteSettingsController::class, 'storeSubcat'])->name('settings.subcat.new');
Route::post('gli-admin/site/settings/category/{action}', [SiteSettingsController::class, 'updateSubcat'])->name('settings.subcat.update');
Route::delete('gli-admin/site/settings/category/{subcat}', [SiteSettingsController::class, 'destroySubcat'])->name('settings.subcat.destroy');

Route::get('gli-admin/site/users', [SiteSettingsController::class, 'userManager'])->name('admin.manager');
Route::get('gli-admin/site/users/create', [RegisterController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('gli-admin/site/users/create', [RegisterController::class, 'register'])->name('register');



