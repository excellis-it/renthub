<?php

use App\Http\Controllers\User\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubscriptionController;
use App\Http\Controllers\Backend\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'auth.role:admin'])
    ->prefix('admin')
    ->name('admin-')

    ->controller(AdminController::class)->group(function () {

        // vendors
        // Route::view(
        //     'vendors',
        //     'backend.admin.all_vendors',
        //     ['data' => User::where('role', '=', 'vendor')->get()]
        // )->name('vendor-list');

        // Route::get('vendors', [AdminController::class, 'vendors'])->name('vendor-list');

        Route::post('activate_vendor', 'vendorActivate')->name('activate-vendor');
        Route::post('remove_vendor', 'userRemove')->name('vendor-remove');

      


        Route::prefix('pages')->group(function () {
            Route::get('list', [PagesController::class, 'pages_index']);
            Route::get('add', [PagesController::class, 'create']);
            Route::post('create', [PagesController::class, 'pages_create']);
            Route::get('edit/{id}', [PagesController::class, 'edit']);
            Route::post('update', [PagesController::class, 'pagesUpdate']);
            Route::get('remove/{id}', [PagesController::class, 'pagesRemove']);
        });


        Route::prefix('slider')->group(function () {
            Route::get('list', [SliderController::class, 'slider_default']);
            Route::get('add', [SliderController::class, 'slider_add']);
            Route::post('create', [SliderController::class, 'slider_create']);
            Route::get('edit/{id}', [SliderController::class, 'edit']);
            Route::post('update', [SliderController::class, 'sliderUpdate']);
            Route::get('remove/{id}', [SliderController::class, 'sliderRemove']);
        });

        Route::prefix('testimonial')->group(function () {
            Route::get('list', [TestimonialController::class, 'testimonial_default']);
            Route::get('add', [TestimonialController::class, 'testimonial_add']);
            Route::post('create', [TestimonialController::class, 'testimonial_create']);
            Route::get('edit/{id}', [TestimonialController::class, 'edit']);
            Route::post('update', [TestimonialController::class, 'testimonialUpdate']);
            Route::get('remove/{id}', [TestimonialController::class, 'testimonialRemove']);
        });


        Route::prefix('subscription')->group(function () {
            Route::get('list', [SubscriptionController::class, 'subscription_default']);
            Route::get('add', [SubscriptionController::class, 'subscription_add']);
            Route::post('create', [SubscriptionController::class, 'subscription_create']);
            Route::get('edit/{id}', [SubscriptionController::class, 'edit']);
            Route::post('update', [SubscriptionController::class, 'subscriptionUpdate']);
            Route::get('remove/{id}', [SubscriptionController::class, 'subscriptionRemove']);
        });

        Route::prefix('user')->group(function () {
            Route::get('listing_user', [UserController::class, 'listing_user']);
            Route::get('edit-user/{id}', [UserController::class, 'edit_user'])->name('edit-user');
            Route::post('update-user', [UserController::class, 'update_user'])->name('update-user');
            Route::get('basic_user', [UserController::class, 'basic_user']);
            Route::get('edit-basic-user/{id}', [UserController::class, 'edit_basic_user'])->name('basic-user');
            Route::post('update-basic-user', [UserController::class, 'update_basic_user'])->name('update-basic-user');
        });

        // fallback
        Route::fallback(function () {
            return redirect('/admin/dashboard');
        })->name('brand-fallback');
    });