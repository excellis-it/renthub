<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\UserEnquiryController;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

// for normal users
Route::middleware(['auth', 'auth.role:user'])
    ->prefix('user')
    ->name('user-')
    ->controller(UserController::class)->group(function () {

        Route::get('change-url', [UserController::class, 'change_url']);
        Route::get('profile', [UserController::class, 'user_profile']);
        Route::get('edit', [UserController::class, 'edit'])->name('edit');
        Route::post('update', [UserController::class, 'update'])->name('update');
        Route::get('change-password', [UserController::class, 'change_password'])->name('change-password');
        Route::post('update-password', [UserController::class, 'updatePassword'])->name('update-password');
        Route::get('payment-history', [UserController::class, 'payment_history']);
        Route::get('subscription-history', [UserController::class, 'subscription_history']);
        
        Route::get('review/{id}', [ReviewController::class, 'review']);
        Route::post('review-store', [ReviewController::class, 'reviewstore']);
        
        Route::get('enquiry', [UserEnquiryController::class, 'list'])->name('enquiry');
        Route::get('enquiry-products/{id}', [UserEnquiryController::class, 'enquiry_products'])->name('enquiry-product');
        Route::get('enquiry-products-filter', [UserEnquiryController::class, 'enquiry_products_filter'])->name('enquiry-product-filter');
        Route::post('delete-enquiry', [UserEnquiryController::class, 'delete_enquiry'])->name('delete-enquiry');

        Route::get('enquiry-machinery/{id}', [UserEnquiryController::class, 'enquiry_machinery'])->name('enquiry-machinery');
        Route::get('enquiry-machinery-filter', [UserEnquiryController::class, 'enquiry_machinery_filter'])->name('enquiry-machinery-filter');

        Route::get('enquiry-electronics/{id}', [UserEnquiryController::class, 'enquiry_electronics'])->name('enquiry-electronics');
        Route::get('enquiry-electronics-filter', [UserEnquiryController::class, 'enquiry_electronics_filter'])->name('enquiry-electronics-filter');

        
        Route::get('enquiry-vehicles/{id}', [UserEnquiryController::class, 'enquiry_vehicles'])->name('enquiry-vehicles');
        Route::get('enquiry-vehicles-filter', [UserEnquiryController::class, 'enquiry_vehicles_filter'])->name('enquiry-vehicles-filter');

        Route::post('enquiry-store', [UserEnquiryController::class, 'enquirystore'])->name('enquiry-store');
        Route::get('edit/{id}', [UserEnquiryController::class, 'edit'])->name('enquiry.edit');
        Route::get('check-enquire', [UserEnquiryController::class, 'check_enquire'])->name('check-enquire');
        // Route::post('update', [UserEnquiryController::class, 'update'])->name('enquiry.update');
    });