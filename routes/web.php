<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::match(['GET', 'POST'], '/', [
    'uses'  =>  'MainController@index',
    'as'  =>  'main.index',
]);
Route::post('/store',[MainController::class,'store'])->name('main.store');
Route::get('/dashboard', [MainController::class, 'viewDashboard'])->name('dashboard');
Route::get('add-object' , [MainController::class,'addObject']);
Route::get("/add-structure" , [MainController::class,'addStruct']);
Route::post('/store-struct', [MainController::class, 'storeStructure'])->name('store-struct');
Route::get('/add-formation' , [MainController::class,'addFormation']);
Route::post('/store-formation' , [MainController::class,'storeFormation'])->name('store-formation');
Route::post('/store-object' , [MainController::class,'storeObjectParteners'])->name('sotre-object');
