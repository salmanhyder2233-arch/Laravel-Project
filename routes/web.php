<?php
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/mission', function () {
    return view('mission');
});

Route::get('/impact', function () {
    return view('impact');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/get-involved', function () {
    return view('get-involved');
});

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
