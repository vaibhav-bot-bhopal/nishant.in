<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'home'])->name('nishant.home');
// Route::get('/gallery', [MainController::class, 'gallery'])->name('nishant.gallery');
Route::get('/photos', [MainController::class, 'photos'])->name('nishant.photos');
Route::get('/about-nishant', [MainController::class, 'about'])->name('nishant.about');
Route::get('/testimonials', [MainController::class, 'testimonials'])->name('nishant.testimonials');
Route::get('/contact', [MainController::class, 'contact'])->name('nishant.contact');
Route::get('/blogs', [BlogController::class, 'blogs'])->name('nishant.blogs');
Route::get('/blog-detail/{slug}', [BlogController::class, 'blogDetail'])->name('nishant.blog-detail');

Auth::routes();

Route::group(['prefix' => 'superadmin', 'middleware' => ['auth', 'isSuperadmin', 'prevent-back-history']], function () {
    // For Super Admin Dashboard
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('dashboard');
    Route::get('/role-edit/{id}', [SuperAdminController::class, 'editUserRole'])->name('editUserRole');
    Route::put('/role-update/{id}', [SuperAdminController::class, 'updateUserRole'])->name('updateUserRole');
    Route::get('/role-delete/{id}', [SuperAdminController::class, 'deleteUserRole'])->name('deleteUserRole');
    Route::get('/changeuserstatus', [SuperAdminController::class, 'changeUserStatus'])->name('changeUserStatus');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin', 'prevent-back-history']], function () {
    // For Admin Dashboard

    // Route for articles
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/news_add', [HomeController::class, 'english'])->name('news_add');
    Route::post('/news_create', [HomeController::class, 'news_create'])->name('news_create');
    Route::get('/news_edit/{id}', [HomeController::class, 'news_edit'])->name('news_edit');
    Route::post('/news_update/{id}', [HomeController::class, 'news_update'])->name('news_update');
    Route::delete('/news_del/{id}', [HomeController::class, 'news_del'])->name('news_del');

    // Route for testimonials
    Route::get('/viewTestimonial', [TestimonialController::class, 'viewTestimonial'])->name('viewTestimonial');
    Route::post('/addTestimonial', [TestimonialController::class, 'addTestimonial'])->name('addTestimonial');
    Route::get('/editTestimonial/{id}', [TestimonialController::class, 'editTestimonial'])->name('editTestimonial');
    Route::post('/updateTestimonial/{id}', [TestimonialController::class, 'updateTestimonial'])->name('updateTestimonial');
    Route::delete('/deleteTestimonial/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('deleteTestimonial');

    // For Gallery Routes
    Route::get('images', [GalleryController::class, 'create'])->name('images');
    Route::post('images-save', [GalleryController::class, 'store'])->name('images-save');
    Route::delete('images-delete/{id}', [GalleryController::class, 'destroy'])->name('images-delete');
    Route::get('images-show', [GalleryController::class, 'index'])->name('images-show');
});
