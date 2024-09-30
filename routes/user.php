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
        Route::get('edit/{id}', [UserController::class, 'edit']);
        Route::post('update', [UserController::class, 'update']);
        Route::get('change-password/{id}', [UserController::class, 'change_password']);
        Route::post('update-password', [UserController::class, 'updatePassword']);
        Route::get('payment-history', [UserController::class, 'payment_history']);
        Route::get('subscription-history', [UserController::class, 'subscription_history']);
        
        Route::get('review/{id}', [ReviewController::class, 'review']);
        Route::post('review-store', [ReviewController::class, 'reviewstore']);
        
        Route::get('enquiry', [UserEnquiryController::class, 'list'])->name('enquiry');
        Route::get('enquiry-products/{id}', [UserEnquiryController::class, 'enquiry_products'])->name('enquiry-product');
        Route::get('enquiry-products-filter', [UserEnquiryController::class, 'enquiry_products_filter'])->name('enquiry-product-filter');

        Route::get('enquiry-machinery/{id}', [UserEnquiryController::class, 'enquiry_machinery'])->name('enquiry-machinery');
        Route::get('enquiry-machinery-filter', [UserEnquiryController::class, 'enquiry_machinery_filter'])->name('enquiry-machinery-filter');

        Route::post('enquiry-store', [UserEnquiryController::class, 'enquirystore'])->name('enquiry-store');
        Route::get('edit/{id}', [UserEnquiryController::class, 'edit'])->name('enquiry.edit');
        Route::post('update', [UserEnquiryController::class, 'update'])->name('enquiry.update');
    });