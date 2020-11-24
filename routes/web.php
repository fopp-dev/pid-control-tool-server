<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Livewire\Inverstors;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ UploadController::class, 'upload'])->name('bots')->middleware('auth');
Route::post('upload', [ UploadController::class, 'uploadFile' ])->name('uploadFile')->middleware('auth');
Route::get('fetch', [ UploadController::class, 'fetch' ])->name('fetch')->middleware('auth');
Route::get('delete', [ UploadController::class, 'delete' ])->name('delete')->middleware('auth');

Route::get('inverstor', Inverstors::class)->name('inverstor')->middleware('auth');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
