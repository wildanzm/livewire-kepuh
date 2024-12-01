<?php

use App\Models\DomicileLetter;

use App\Livewire\DomicileLetterPdf;
use App\Livewire\Admin\RequestIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\UserRequestComponent;
use App\Livewire\Admin\Letter\Domicile;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route untuk halaman permintaan surat
    Route::get('request-letter', RequestIndex::class)->name('request');

    // Route::get('/domicile-letter/{requestId}/preview', DomicileLetterPdf::class)->name('domicile-letterpdf');

    Route::get('/domicile-letter', Domicile::class)->name('domicile-letter');
});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/request-letter', UserRequestComponent::class)->name('request.letter');
    Route::get('/user/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
});

Route::middleware(['auth'])->get('/dashboard', function () {
    return redirect()->route('user.dashboard');
})->name('dashboard');


Route::view('/', 'welcome')->name('welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// Route::view('dashboard', 'layouts.admin')->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';
