<?php

use App\Http\Controllers\User\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubscriptionController;
use App\Http\Controllers\Backend\InquiryController;
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


        Route::prefix('inquiries')->group(function(){
            Route::get('/property-list', [InquiryController::class, 'property_list'])->name('inquiries-property-list');
            Route::get('/property-filter', [InquiryController::class, 'property_filter'])->name('inquiries-property-filter');

            Route::get('/machinery-list', [InquiryController::class, 'machinery_list'])->name('inquiries-machinery-list');
            Route::get('/machinery-filter', [InquiryController::class, 'machinery_filter'])->name('inquiries-machinery-filter');

            Route::get('/vehicle-list', [InquiryController::class, 'vehicle_list'])->name('inquiries-vehicle-list');
            Route::get('/vehicle-filter', [InquiryController::class, 'vehicle_filter'])->name('inquiries-vehicle-filter');

            Route::get('/electronics-list', [InquiryController::class, 'electronics_list'])->name('inquiries-electronics-list');
            Route::get('/electronics-filter', [InquiryController::class, 'electronics_filter'])->name('inquiries-electronics-filter');
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

        Route::prefix('brands')->group(function () {
            Route::get('list', [BrandController::class, 'index'])->name('brands.index');
            Route::get('add', [BrandController::class, 'create'])->name('brands.create');
            Route::post('create', [BrandController::class, 'store']);
            Route::get('edit/{id}', [BrandController::class, 'edit']);
            Route::post('update', [BrandController::class, 'update']);
            Route::get('remove/{id}', [BrandController::class, 'destroy']);
        });


        Route::prefix('subscription')->group(function () {
            Route::get('list', [SubscriptionController::class, 'subscription_default']);
            Route::get('add', [SubscriptionController::class, 'subscription_add']);
            Route::post('create', [SubscriptionController::class, 'subscription_create']);
            Route::get('edit/{id}', [SubscriptionController::class, 'edit']);
            Route::post('update', [SubscriptionController::class, 'subscriptionUpdate']);
            Route::get('remove/{id}', [SubscriptionController::class, 'subscriptionRemove']);
            Route::get('history', [SubscriptionController::class, 'history']);
            Route::get('subscription-ajax-history',[SubscriptionController::class, 'ajaxHistory'])->name('ajax.subscription-history');
            
        });

        Route::prefix('user')->group(function () {
            Route::get('listing_user', [UserController::class, 'listing_user'])->name('listing-user');
            Route::get('edit-user/{id}', [UserController::class, 'edit_user'])->name('edit-user');
            Route::post('update-user', [UserController::class, 'update_user'])->name('update-user');
            Route::get('remove-listing-user/{id}', [UserController::class, 'remove_listing_user'])->name('remove-listing-user');
            Route::get('change-password-list/{id}',[UserController::class,'list_change_password'])->name('change-password-list');
            Route::post('store-password',[UserController::class,'store'])->name('store-password-list');
            Route::get('basic_user', [UserController::class, 'basic_user']);
            Route::get('edit-basic-user/{id}', [UserController::class, 'edit_basic_user'])->name('basic-user');
            Route::post('update-basic-user', [UserController::class, 'update_basic_user'])->name('update-basic-user');
            Route::get('remove-basic-user/{id}', [UserController::class, 'remove_basic_user'])->name('remove-basic-user');
            Route::get('change-password-basic/{id}',[UserController::class,'basic_user_change_password'])->name('change-password-basic');
            Route::post('update-password',[UserController::class,'store_basic_user'])->name('store-basic-user');
            
        });

        // fallback
        Route::fallback(function () {
            return redirect('/admin/dashboard');
        })->name('brand-fallback');
    });