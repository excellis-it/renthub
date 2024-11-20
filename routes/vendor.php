<?php

use App\Http\Controllers\User\VendorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Controllers\User\UserController;

use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\VehicleController;
use App\Http\Controllers\Backend\MachineryController;
use App\Http\Controllers\Backend\ElectronicsController;

use App\Http\Controllers\Backend\InquiryController;
use App\Http\Controllers\Backend\SubscriptionController;
use App\Http\Controllers\Backend\PaymentController;

use App\Http\Controllers\Backend\CronJobController;

use App\Http\Controllers\Vendor\PaypalPaymentController;

/*
|--------------------------------------------------------------------------
| vendor Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'auth.role:vendor'])
    ->prefix('vendor')
    ->name('vendor-')
    ->controller(VendorController::class)->group(function () {

        Route::get('subscription', [VendorController::class, 'vendors'])->name('vendor-list');

        //Property 

        Route::prefix('property')->group(function () {
            Route::post('create', [PropertyController::class, 'create'])->name('property.create');
            Route::get('add', [PropertyController::class, 'add']);
            Route::get('list', [PropertyController::class, 'list'])->name('property.list');
            Route::get('filter', [PropertyController::class, 'listFilter'])->name('property.filter');
            Route::get('edit/{id}', [PropertyController::class, 'edit']);
            Route::post('update', [PropertyController::class, 'update'])->name('property.update');
            Route::get('remove/{id}', [PropertyController::class, 'delete']);
        });

        //Vehicle
        Route::prefix('vehicle')->group(function () {
            Route::get('list', [VehicleController::class, 'list']);
            Route::get('add', [VehicleController::class, 'add']);
            Route::get('filter', [VehicleController::class, 'listFilter'])->name('vehicle.filter');
            Route::post('create', [VehicleController::class, 'create']);
            Route::get('edit/{id}', [VehicleController::class, 'edit']);
            Route::post('update', [VehicleController::class, 'update']);
            Route::get('remove/{id}', [VehicleController::class, 'delete']);
        });


        //Machinery Routes
        Route::prefix('machinery')->group(function () {
            Route::get('list', [MachineryController::class, 'list']);
            Route::get('filter', [MachineryController::class, 'listFilter'])->name('machinery.filter');
            Route::get('add', [MachineryController::class, 'add']);
            Route::post('create', [MachineryController::class, 'create'])->name('machinery.create');
            Route::get('edit/{id}', [MachineryController::class, 'edit']);
            Route::post('update', [MachineryController::class, 'update']);
            Route::get('remove/{id}', [MachineryController::class, 'delete']);
        });


        //Electronics Routes
        Route::prefix('electronics')->group(function () {
            Route::get('list', [ElectronicsController::class, 'list']);
            Route::get('filter', [ElectronicsController::class, 'listFilter'])->name('electronics.filter');
            Route::get('add', [ElectronicsController::class, 'add']);
            Route::post('create', [ElectronicsController::class, 'create']);
            Route::get('edit/{id}', [ElectronicsController::class, 'edit']);
            Route::post('update', [ElectronicsController::class, 'update']);
            Route::get('remove/{id}', [ElectronicsController::class, 'delete']);
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


        Route::get('subscription-purchase',[SubscriptionController::class, 'purchase'])->name('subscription-purchase');
        Route::get('subscription-history', [SubscriptionController::class, 'history'])->name('subscription-history');
        Route::get('subscription-ajax-history',[SubscriptionController::class, 'ajaxHistory'])->name('ajax.subscription-history');
        Route::get('payment/{id}', [PaymentController::class, 'payment_index']);
        Route::post('payment-create', [PaymentController::class, 'payment_create']);

       
        

        // fallback
        Route::fallback(function () {
            return redirect('/vendor/profile');
        })->name('brand-fallback');
    });



    Route::middleware(['auth', 'auth.role:vendor'])
    ->prefix('vendor/paypal-payment')
    ->group(function () {
        Route::get('create/{id}', [PaypalPaymentController::class, 'createPayment'])
            ->name('vendor.paypal-payment.create');
        Route::get('success', [PaypalPaymentController::class, 'successPayment'])->name('vendor.paypal-payment.success');
        Route::get('cancel', [PaypalPaymentController::class, 'cancelPayment'])->name('vendor.paypal-payment.cancel');
    });
