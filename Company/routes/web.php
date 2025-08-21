<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], static function ($router) {
    $router->get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    $router->get('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');

    // Users

    $router->resource('/users', \App\Http\Controllers\Admin\UserController::class)->middleware('role:author,user');
});


require __DIR__.'/auth.php';
