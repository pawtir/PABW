
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanjirController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lapor-banjir', [BanjirController::class, 'form'])
    ->name('banjir.form');

Route::post('/lapor-banjir/proses', [BanjirController::class, 'proses'])
    ->name('banjir.proses');

require __DIR__.'/sirkula_routes.php';

