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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Files/allFiles',[FileController::class,'listAdmin'])->name('listAdmin')->middleware('auth');
Route::get('/Files/myFiles',[FileController::class,'listBasic'])->name('listBasic')->middleware('auth');
Route::get('/uploadBasic',[FileController::class,'uploadBasic'])->name('uploadBasic')->middleware('auth');
Route::post('/upload',[FileController::class,'saveDataByTag'])->name('saveDataByTag')->middleware('auth');
Route::get('/uploadAdmin',[FileController::class,'uploadAdmin'])->name('uploadAdmin')->middleware('auth');
Route::get('/download/{id}',[FileController::class,'download'])->name('download')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('files', FileController::class);   
});

