<?php


use App\Http\Controllers\SirkulaController;
use Illuminate\Support\Facades\Route;

Route::prefix('sirkula')->name('sirkula.')->group(function () {
    Route::view('/', 'sirkula.landing')->name('landing');

    Route::get('/register', [SirkulaController::class, 'formRegister'])->name('register');
    Route::post('/register', [SirkulaController::class, 'prosesRegister'])->name('register.proses');
    Route::get('/login', [SirkulaController::class, 'formLogin'])->name('login');
    Route::post('/login', [SirkulaController::class, 'prosesLogin'])->name('login.proses');
    Route::post('/logout', [SirkulaController::class, 'logout'])->name('logout');

    foreach (['warga', 'pengurus'] as $role) {
        foreach (['dashboard', 'sampah', 'iuran', 'kebun', 'lapor', 'akun'] as $halaman) {
            Route::get("/{$role}/{$halaman}", [SirkulaController::class, 'halaman'])
                ->defaults('role', $role)
                ->defaults('halaman', $halaman)
                ->name("{$role}.{$halaman}");
        }
    }
});
