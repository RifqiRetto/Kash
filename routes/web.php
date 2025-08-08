<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Livewire\Dashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Exports\StudentReportExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Export
Route::get('/laporan/export', function () {
    return Excel::download(new StudentReportExport, 'laporan_siswa.xlsx');
})->middleware(['auth', 'role:admin'])->name('laporan.export');

// Semua yang login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::resource('students', StudentController::class);
        Route::resource('transactions', TransactionController::class);
        Route::get('settings/profile', Profile::class)->name('settings.profile');
        Route::get('settings/password', Password::class)->name('settings.password');
        Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

        // admin editor page
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    });

    Route::middleware('role:admin,viewer')->group(function () {
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    });
});

require __DIR__.'/auth.php';
