<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::match(['GET', 'POST'], '/', [
    'uses'  =>  'MainController@index',
    'as'  =>  'main.index',
]);
Route::post('/store',[MainController::class,'store'])->name('main.store');
