<?php



use App\Http\Controllers\Admin\DomicileController;
use App\Livewire\Admin\AdminRequestComponent;
use App\Livewire\Admin\Letter\EditDomicile;
use App\Livewire\Admin\Letter\Poverty;
use App\Livewire\DomicileLetterPdf;
use App\Livewire\Admin\RequestIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\UserRequestComponent;
use App\Livewire\Admin\Letter\Domicile;
use App\Http\Controllers\DashboardController;
use App\Livewire\Admin\Letter\EditPoverty;
use App\Livewire\Admin\WaterDebit;
use App\Livewire\Index;
use App\Livewire\User\RequestDashboard;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route untuk halaman permintaan surat
    Route::get('request', RequestIndex::class)->name('request');
    Route::get('request-letter', AdminRequestComponent::class)->name('request.letter');

    Route::get('/domicile-letter/{id}/download', [Domicile::class, 'downloadPDF'])->name('domicile-letter.download');
    Route::get('/poverty-letter/{id}/download', [Poverty::class, 'downloadPDF'])->name('poverty-letter.download');
    Route::get('/domicile-letter/{id}/preview', [Domicile::class, 'streamPDF'])->name('domicile-letter.streamPDF');
    Route::get('/poverty-letter/{id}/preview', [Poverty::class, 'streamPDF'])->name('poverty-letter.streamPDF');

    Route::get('/domicile-letter', Domicile::class)->name('domicile-letter');
    Route::get('/domicile-letter/edit/{id}', EditDomicile::class)->name('domicile.edit');
    Route::get('/poverty-letter', Poverty::class)->name('poverty-letter');
    Route::get('/poverty/edit/{id}', action: EditPoverty::class)->name('poverty.edit');
    Route::get('/water-debit', WaterDebit::class)->name('water');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('request-letter', UserRequestComponent::class)->name('request.letter');
    Route::get('dashboard-request', RequestDashboard::class)->name('dashboard.request');
    // Route::get('/user/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
});

// Route::middleware(['auth'])->get('/dashboard', function () {
//     return redirect()->route('user.dashboard');
// })->name('dashboard');

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
