<?php



use App\Http\Controllers\Admin\DomicileController;
use App\Livewire\Admin\Letter\Poverty;
use App\Livewire\DomicileLetterPdf;
use App\Livewire\Admin\RequestIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\UserRequestComponent;
use App\Livewire\Admin\Letter\Domicile;
use App\Http\Controllers\DashboardController;
use App\Livewire\Admin\Letter\EditPoverty;
use App\Livewire\Index;


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route untuk halaman permintaan surat
    Route::get('request-letter', RequestIndex::class)->name('request');

    Route::get('/domicile-letter/{id}/download', [Domicile::class, 'downloadPDF'])->name('domicile-letter.download');
    Route::get('/poverty-letter/{id}/download', [Poverty::class, 'downloadPDF'])->name('poverty-letter.download');
    // Route::get('/domicile-letter/{id}/download', [Domicile::class, 'downloadPDF'])->name('domicile-letter.download');

    Route::get('/domicile-letter', Domicile::class)->name('domicile-letter');
    Route::get('/poverty-letter', Poverty::class)->name('poverty-letter');
    Route::get('/poverty/edit/{id}', action: EditPoverty::class)->name('poverty.edit');
    Route::get('/cobapdf', [Poverty::class, 'cobapdf'])->name('cobapdf');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/request-letter', UserRequestComponent::class)->name('request.letter');
    Route::get('/user/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
});

Route::middleware(['auth'])->get('/dashboard', function () {
    return redirect()->route('user.dashboard');
})->name('dashboard');

Route::get('/', Index::class)->name('index');

// Route::view('/', 'welcome')->name('welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// Route::view('dashboard', 'layouts.admin')->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';
