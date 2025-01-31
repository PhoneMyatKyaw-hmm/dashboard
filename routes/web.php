<?php

use App\Services\TempMediaService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
    Route::resource('roles', RoleController::class)->except('show');
});
