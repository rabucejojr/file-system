<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/app', function () {
    return view('partials.app');
});
Route::get('/upload', [FileController::class, 'upload_file'])->name('upload');
Route::get('/table', [FileController::class, 'table'])->name('table');
Route::post('/store', [FileController::class, 'store'])->name('store');
