<?php

use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Registration;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
Route::post('/', [RegistrationController::class, 'store'])->name('registrations.store');



Route::get('pesan', function () {
    return Inertia::render('pesan/Index');
})->middleware(['auth', 'verified']);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [KegiatanController::class, 'dashboard'])->name('dashboard');
    //user handle
    Route::get('/users', [RegisteredUserController::class, 'index'])->name('users.index');
    Route::get('/users/register', [RegisteredUserController::class, 'create'])->name('users.create');
    Route::post('/users/register', [RegisteredUserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [RegisteredUserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [RegisteredUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [RegisteredUserController::class, 'destroy'])->name('users.destroy');


    //rekam medis handle
    Route::prefix('rekam-medis')->group(function () {
        Route::get('/', [MedicalRecordController::class, 'index'])->name('rekam-medis.index');
        Route::get('/create/{registration}', [MedicalRecordController::class, 'create'])->name('rekam-medis.create');
        Route::post('/', [MedicalRecordController::class, 'store'])->name('rekam-medis.store');
        Route::get('/{registration}', [MedicalRecordController::class, 'show'])->name('rekam-medis.show');
        Route::delete('/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');

    });
    
    //kegiatan

     Route::prefix('kegiatan')->group(function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan.index');
        Route::get('/create/{kegiatan}', [KegiatanController::class, 'create'])->name('kegiatan.create');
        Route::post('/', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::get('/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
        Route::delete('/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');


    //pesan 
    
    });
});
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
