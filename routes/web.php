<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
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
Route::get('contact', [GuestController::class, 'showContactPage'])->name('guest.contact');
Route::get('portfolio', [GuestController::class, 'showPortfolioPage'])->name('guest.portfolio');
Route::get('blog/posts', [PostsController::class, 'index'])->name('guest.blog');

Route::redirect('gli-admin', 'gli-admin/dashboard');

Route::get('gli-admin/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm')->middleware('guest');

Route::post('gli-admin/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('gli-admin/register', [RegisterController::class, 'showRegisterForm'])->name('showRegisterForm');

Route::post('gli-admin/register', [RegisterController::class, 'register'])->name('register');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('gli-admin/dashboard', [DashboardController::class, 'viewDashboard'])->name('viewDashboard');

Route::get('gli-admin/posts', [PostsController::class, 'adminPost'])->name('adminPost');

Route::get('gli-admin/posts/create', [PostsController::class, 'create'])->name('post.create');

Route::post('gli-admin/posts/create', [PostsController::class, 'store'])->name('post.store');

Route::get('gli-admin/posts/edit/{post}', [PostsController::class, 'edit'])->name('post.edit');

Route::put('gli-admin/posts/edit/{post}', [PostsController::class, 'update'])->name('post.update');

Route::delete('gli-admin/posts/{post}', [PostsController::class, 'destroy'])->name('post.destroy');





