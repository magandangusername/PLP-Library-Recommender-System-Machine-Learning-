<?php

use App\Http\Controllers\GuestViewsController;
use App\Http\Controllers\SessionViewsController;
use App\Http\Controllers\AdminViewsController;
use Illuminate\Support\Facades\Route;



Route::get('/accountancy', [SessionViewsController::class, 'accountancy'])->name('accountancy');
Route::get('/artsandscience', [SessionViewsController::class, 'artsandscience'])->name('artsandscience');
Route::get('/computerstudies', [SessionViewsController::class, 'computerstudies'])->name('computerstudies');
Route::get('/education', [SessionViewsController::class, 'education'])->name('education');
Route::get('/engineering', [SessionViewsController::class, 'engineering'])->name('engineering');
Route::get('/hotelmanagement', [SessionViewsController::class, 'hotelmanagement'])->name('hotelmanagement');
Route::get('/nursing', [SessionViewsController::class, 'nursing'])->name('nursing');
Route::get('/', [SessionViewsController::class, 'homepage'])->name('home');
Route::get('/SessionViews/recommendationpage', [SessionViewsController::class, 'recommendationpage']);
Route::get('/SessionViews/savedpage', [SessionViewsController::class, 'savedpage']);
Route::get('/SessionViews/profilepage', [SessionViewsController::class, 'profilepage']);
Route::get('/AdminViews/manageaccount', [AdminViewsController::class, 'manageaccount']);
Route::get('/AdminViews/managedocument', [AdminViewsController::class, 'managedocument']);
Route::get('/AdminViews/addnewaccount', [AdminViewsController::class, 'addnewaccount']);
Route::get('/AdminViews/addnewdocument', [AdminViewsController::class, 'addnewdocument']);


Auth::routes();
