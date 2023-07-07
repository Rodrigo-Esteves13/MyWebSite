<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/welcome', function () {
    return redirect()->route('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/chat', [AppsController::class, 'chat']);
Route::post('/projects', [AppsController::class, 'projects']);
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
