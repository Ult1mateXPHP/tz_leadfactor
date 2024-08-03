<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

//only for AmoCRM methods
Route::group(['namespace' => 'App\Http\Controllers\AmoCRM', 'domain' => Config::get('app.url')], function() {
   Route::post('/webhook', 'WebhookController@recieve');
});
