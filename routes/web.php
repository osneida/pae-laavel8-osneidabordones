<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

//, 'verified'

Route::group(["middleware"=> ['auth']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); 
    
    Route::get('/contact',  [ ContactController::class, 'index' ])->name('contact.index');
    Route::post('/contact', [ ContactController::class, 'send' ])->name('contact.send');

    
});
