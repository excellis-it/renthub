<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CmsController;

use App\Http\Controllers\Frontend\ProductController;

use App\Http\Controllers\Frontend\RegisterController;

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\ProfileController;

use App\Http\Controllers\CronJobController;

Route::get('/', [CmsController::class, 'home'])->name('home');
Route::get('/search', [CmsController::class, 'searchProduct'])->name('search.product');

Route::get('vehicles', [CmsController::class, 'vehicle']);
Route::get('vehicle-search', [CmsController::class, 'vehicle_search']);

Route::get('property-for-sell', [CmsController::class, 'property_for_sell']);
Route::get('property-for-sell-search', [CmsController::class, 'property_sell_search']);

Route::get('property-for-rent', [CmsController::class, 'property_for_rent']);
Route::get('property-for-rent-search', [CmsController::class, 'property_rent_search']);

Route::get('equipment-and-machineries', [CmsController::class, 'equipment_machineries']);
Route::get('equipment-and-machineries-search', [CmsController::class, 'machinery_search']);

Route::get('electronics-home-appliances', [CmsController::class, 'electronic_home']);
Route::get('electronics-home-appliances-search', [CmsController::class, 'electronic_search']);

Route::get('all-categories', [CmsController::class, 'all_categories']);
Route::get('signup', [CmsController::class, 'register']);

Route::get('all-categories-sub/{category_slug}/{sub_category_slug}', [CmsController::class, 'all_categories_subcategories']);

Route::post('/search-result', [CmsController::class, 'searchResult'])->name('product.search');
Route::get('privacy-policy', [RegisterController::class, 'privacy']);
Route::get('disclaimer',[CmsController::class,'disclaimer']);

Route::get('review', [CmsController::class, 'review']);

Route::get('property-details/{id}', [CmsController::class, 'property_details'])->name('property-details');
Route::get('vehicle-details/{id}', [CmsController::class, 'vehicle_details'])->name('vehicle-details');
Route::get('electronics-home-appliances-details/{id}', [CmsController::class, 'electronics_details'])->name('electronics-details');
Route::get('equipment-and-machineries-details/{id}', [CmsController::class, 'machineries_details'])->name('machineries-details');
Route::get('subscription', [CmsController::class, 'subscription']);


/*******Register Controller *******/
Route::post('/listing-user-register', [RegisterController::class, 'listing_user_register'])->name('listing-user-register');
Route::post('/basic-user-register', [RegisterController::class, 'basic_user_register'])->name('basic-user-register');



require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/vendor.php';
require_once __DIR__ . '/profile.php';
require_once __DIR__ . '/user.php';
require_once __DIR__ . '/brand.php';
require_once __DIR__ . '/category.php';
require_once __DIR__ . '/sub_category.php';
require_once __DIR__ . '/product.php';
require_once __DIR__ . '/coupon.php';
require_once __DIR__ . '/notifications.php';
require_once __DIR__ . '/socialite.php';

Route::get('/{category_slug}', [CmsController::class, 'categories']);
Route::get('/{category_slug}/{sub_category_slug}', [CmsController::class, 'subcategories']);


// Route::post('/search-result', [CmsController::class, 'searchResult'])->name('product.search');
