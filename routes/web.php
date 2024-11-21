<?php

use App\Livewire\Admin\RequestIndex;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('request-letter', RequestIndex::class)->name('request');
});

Route::view('/', 'welcome')->name('welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// Route::view('dashboard', 'layouts.admin')->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';
