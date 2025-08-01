<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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


Route::get('/', [PostController::class, 'index']);
Route::get('create', [PostController::class, 'create'])->name('create');
Route::get('generate_pdf', [PostController::class, 'generate_pdf']);
Route::get('generate_csv', [PostController::class,'generate_csv']);
Route::get('download_csv', [PostController::class, 'download_csv']);
Route::get('edit/{id}', [PostController::class, 'edit']);
Route::get('delete/{id}', [PostController::class, 'destroy']);
Route::post('update', [PostController::class, 'update']);
Route::post('store', [PostController::class, 'store']);
