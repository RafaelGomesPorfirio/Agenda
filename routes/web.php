<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

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



Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/signin', [UserController::class, 'loginPost']);




Route::get('/register', [UserController::class, 'registerView']);
Route::post('/signup', [UserController::class, 'registerPost']);



Route::get('/contacts/create', [ContactController::class, 'create']);




Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/contacts', [ContactController::class, 'getAll']);

    
    Route::post('/contacts/store', [ContactController::class, 'store']);

    
    Route::get('/contacts/show/{id}', [ContactController::class, 'getById']);

    
    Route::get('/contacts/edit/{id}', [ContactController::class, 'edit']);
    Route::post('/contacts/update/{id}', [ContactController::class, 'update']);

    
    Route::get('/contacts/delete/{id}', [ContactController::class, 'destroy']);
});
