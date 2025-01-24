<?php

use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Social Auth Routes
|--------------------------------------------------------------------------
*/

Route::prefix('social_auth')->controller(SocialiteController::class)
    ->group(function (){
       Route::get('google', 'redirectToGoogle')->name('google-redirect');
       Route::get('google/callback', 'googleCallback')->name('google-callback');

       Route::get('facebook', 'redirectToFacebook')->name('facebook-redirect');
       Route::get('facebook/callback', 'facebookCallback')->name('facebook-callback');

       Route::get('youtube', 'redirectToYoutube')->name('youtube-redirect');
       Route::get('youtube/callback', 'youtubeCallback')->name('youtube-callback');

       Route::get('yahoo', 'redirectToYahoo')->name('yahoo-redirect');
       Route::get('yahoo/callback', 'yahooCallback')->name('yahoo-callback');
    });
