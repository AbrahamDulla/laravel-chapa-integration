<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user', function() {
    return 'abrelo';
    
});

Route::post('pay', [ChapaController::class, 'initialize']);


// Route::post('/pay', 'App\Http\Controllers\ChapaController@initialize')->name('pay');