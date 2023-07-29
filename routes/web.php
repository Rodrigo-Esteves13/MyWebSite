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

//chat routes
Route::get('/chat', [ChatController::class, 'chat']);

//project routes
Route::get('/projects', [ProjectsController::class, 'projects'])->name('projects');
Route::get('/projects/{id}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
Route::put('/projects/{id}', [ProjectsController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', 'ProjectController@destroy')->name('projects.destroy');
Route::get('/projects/{id}', [ProjectsController::class, 'show'])->name('projects.show');



//profile routes
Route::get('profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{username}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/{username}', [ProfileController::class, 'destroy'])->name('profile.destroy');
