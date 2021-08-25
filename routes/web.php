<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('files', FileController::class);
    Route::get('/Files/allFiles',[FileController::class,'listAdmin'])->name('listAdmin');
    Route::get('/Files/myFiles',[FileController::class,'listBasic'])->name('listBasic');
    Route::get('/uploadBasic',[FileController::class,'uploadBasic'])->name('uploadBasic');
    Route::post('/upload',[FileController::class,'saveDataByTag'])->name('saveDataByTag');
    Route::get('/uploadAdmin',[FileController::class,'uploadAdmin'])->name('uploadAdmin');
    Route::get('/download/{id}',[FileController::class,'download'])->name('download');
});

