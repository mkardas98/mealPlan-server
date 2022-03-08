<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ClientController;

Route::get('/', function () { return redirect()->route('login'); });

Auth::routes(['register' => false]);

Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::match(['get', 'post'],'/', 'edit')->name('edit');
});

Route::controller(HomeController::class)->prefix('home')->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(ClientController::class)->prefix('clients')->name('clients.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::match(['get', 'post'],'/edit/{id?}', 'edit')->name('edit');
    Route::delete('/delete/{id?}', 'delete')->name('delete');
    Route::get('/verification/{id}', 'verification')->name('verification');

});



