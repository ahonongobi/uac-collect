<?php

use App\Http\Controllers\EditController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::match(['GET', 'POST'], '/', [
    'uses'  =>  'MainController@index',
    'as'  =>  'main.index',
]);
Route::post('/store',[MainController::class,'storeData'])->name('main.store');
Route::get('/dashboard', [MainController::class, 'viewDashboard'])->name('dashboard');
Route::get('add-object' , [MainController::class,'addObject']);
Route::get("/add-structure" , [MainController::class,'addStruct']);
Route::post('/store-struct', [MainController::class, 'storeStructure'])->name('store-struct');
Route::get('/add-formation' , [MainController::class,'addFormation']);
Route::post('/store-formation' , [MainController::class,'storeFormation'])->name('store-formation');
Route::post('/store-object' , [MainController::class,'storeObjectParteners'])->name('sotre-object');
Route::get("/see" , [EditController::class,'edit']);
Route::get("/add-type" , [MainController::class,'addType'])->name('add-type');
Route::post('/store-type' , [MainController::class,'storeType'])->name('store-type');
Route::get("/delete-type/{id}" , [MainController::class,'DeleteType'])->name('delete-type');



