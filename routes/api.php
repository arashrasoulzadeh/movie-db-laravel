<?php

use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get( '/id/{id}', [ MovieController::class, 'single' ] );

Route::group( [ 'prefix' => 'search' ], function()  
{  
    Route::get( '{year}/{query}', [ MovieController::class, 'searchByNameAndYear' ] );
});  
