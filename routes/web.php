<?php
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Models\SiteSetting;


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
    $settings = SiteSetting::first();
    return view('get-involved', compact('settings'));
});

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::post('/apply', [ApplicationController::class, 'send'])->name('apply.send');

Route::get('/admin-login', [AdminAuthController::class, 'showLogin']);
Route::post('/admin-login', [AdminAuthController::class, 'login']);

Route::middleware('admin.password')->group(function () {
    Route::get('/twc-panel-8x2', [AdminController::class, 'index']);
    Route::delete('/admin/submission/{id}', [AdminController::class, 'deleteSubmission']);
    Route::delete('/admin/application/{id}', [AdminController::class, 'deleteApplication']);
    Route::post('/admin/settings', [AdminController::class, 'updateSettings']);
});

Route::post('/admin-logout', function (\Illuminate\Http\Request $request) {
    $request->session()->forget('admin_ok');
    return redirect('/admin-login');
});