<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/welcome', function () {
    return redirect()->route('welcome');
});

Auth::routes();
Route::get('/chat', [ChatController::class, 'chat']);
Route::get('/projects', [ProjectsController::class, 'projects'])->name('projects'); // List projects
Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store'); // Create a new project
Route::get('profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/{username}', [ProfileController::class, 'destroy'])->name('profile.destroy');