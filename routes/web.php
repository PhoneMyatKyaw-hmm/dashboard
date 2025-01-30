<?php

use App\Http\Controllers\UserController;
use App\Services\TempMediaService;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Route::get('/tables', function () {
    //     return view('table');
    // });

    Route::post('temp-upload', [TempMediaService::class, 'storeTempFile'])->name('temp.upload');
    Route::delete('temp-delete', [TempMediaService::class, 'deleteTempFile'])->name('temp.delete');

    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::resource('users', UserController::class)->except('show');
});
