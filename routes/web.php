<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SafariController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/safaris', [SafariController::class, 'index'])->name('safaris.index');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/safaris/create', [SafariController::class, 'create'])->name('safaris.create');
    Route::post('/safaris', [SafariController::class, 'store'])->name('safaris.store');
    Route::get('/safaris/{id}/edit', [SafariController::class, 'edit'])->name('safaris.edit');
    Route::put('/safaris/{id}', [SafariController::class, 'update'])->name('safaris.update');
    Route::delete('/safaris/{id}', [SafariController::class, 'destroy'])->name('safaris.destroy');
});