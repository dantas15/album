<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PhotoController::class, 'index']);

Route::get('/photos', [PhotoController::class, 'showAll']);

Route::get('/photos/new', [PhotoController::class, 'create']);

Route::post('/photos', [PhotoController::class, 'store']);

Route::get('/photos/edit/{id}', [PhotoController::class, 'edit']);

Route::put('/photos/edit/{id}', [PhotoController::class, 'update']);
