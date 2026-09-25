<?php

use App\Http\Controllers\ContactRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/demandes-de-contact', [ContactRequestController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact-requests.store');
