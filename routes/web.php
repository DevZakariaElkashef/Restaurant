<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ContactMeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\MailBoxController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginWithFacebookController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('our_menu', [HomeController::class, 'menu'])->name('our_menu');
Route::get('our_gallery', [HomeController::class, 'gallery'])->name('our_gallery');
Route::get('our_chefs', [HomeController::class, 'chefs'])->name('our_chefs');
Route::get('our_cart', [HomeController::class, 'cart'])->name('our_cart');
Route::get('contact', [HomeController::class, 'contact',])->name('contact');



Route::middleware(['auth'])->group(function () {
    
    Route::middleware(['stuffonly'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('todo-list', [DashboardController::class, 'todoList'])->name('todolist');
        Route::get('notes', [DashboardController::class, 'notes'])->name('notes');
        Route::get('calendar', [DashboardController::class, 'calendar'])->name('calendar');


        Route::resource('categories', CategoryController::class);
        Route::resource('dishes', DishController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('chefs', ChefController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('account', AccountController::class);
        Route::resource('restaurant', RestaurantController::class);
        Route::resource('mailbox', MailBoxController::class);
        Route::get('admin-profile', ProfileController::class)->name('admins_profile');
    });

    Route::post('contact-me', ContactMeController::class)->name('contactme');

});
Route::get('login/google', [LoginWithGoogleController::class, 'redirectGoogle']);
Route::get('login/google/callback', [LoginWithGoogleController::class, 'googleCallback']);

Route::get('login/facebook', [LoginWithFacebookController::class, 'redirectFacebook']);
Route::get('login/facebook/callback', [LoginWithFacebookController::class, 'facebookCallback']);

