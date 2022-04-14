<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class, 'viewIndexPage'])->name('viewIndexPage');

Route::get('/registerPage', [IndexController::class, 'viewRegisterPage'])->name('viewRegisterPage');
Route::post('/createUser', [IndexController::class, 'createUser'])->name('createUser');

Route::post('/authUser', [IndexController::class, 'authUser'])->name('authUser');


Route::get('/contentPage/{id}', [IndexController::class, 'viewContentPage'])->name('contentPage')->middleware('auth');
Route::post('/createPost{id}', [IndexController::class, 'createPost'])->name('createPost');

Route::delete('/deletePost/{id}', [IndexController::class, 'deletePost'])->name('deletePost');

Route::get('/logout', [IndexController::class, 'logout'])->name('logout');

Route::get('/updatePage/{id}', [IndexController::class, 'viewUpdatePage'])->name('viewUpdatePage')->middleware('auth');
Route::put('/updatePost/{id}', [IndexController::class, 'updatePost'])->name('updatePost');