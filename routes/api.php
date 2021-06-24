<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post("login",[UserController::class,'index' ]);
Route::apiResources([
    'registration' => 'UserController',
    'resetPassword'=>'UserController'
    
]);

