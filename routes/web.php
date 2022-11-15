<?php

use App\Http\Controllers\GuestViewsController;
use App\Http\Controllers\SessionViewsController;
use App\Http\Controllers\AdminViewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('can:is_librarian')->group(function () {
    Route::get('/overview', [AdminViewsController::class, 'overview'])->name('overview');
});

Route::get('/accountancy', [SessionViewsController::class, 'accountancy'])->name('accountancy');
Route::get('/{college}/search', [SessionViewsController::class, 'search'])->name('search');
Route::get('/artsandscience', [SessionViewsController::class, 'artsandscience'])->name('artsandscience');
Route::get('/computerstudies', [SessionViewsController::class, 'computerstudies'])->name('computerstudies');
Route::get('/education', [SessionViewsController::class, 'education'])->name('education');
Route::get('/engineering', [SessionViewsController::class, 'engineering'])->name('engineering');
Route::get('/hotelmanagement', [SessionViewsController::class, 'hotelmanagement'])->name('hotelmanagement');
Route::get('/nursing', [SessionViewsController::class, 'nursing'])->name('nursing');
Route::get('/', [SessionViewsController::class, 'homepage'])->name('home')->middleware('auth');
Route::get('/SessionViews/recommendationpage', [SessionViewsController::class, 'recommendationpage']);
Route::get('/SessionViews/savedpage', [SessionViewsController::class, 'savedpage']);
Route::get('/SessionViews/profilepage', [SessionViewsController::class, 'profilepage']);
Route::get('/layouts/app', [SessionViewsController::class, 'fetchuser']);
Route::get('/viewpage/{title}', [SessionViewsController::class, 'viewpage'])->name('viewpage');

Route::get('/manageaccount', [AdminViewsController::class, 'manageaccount'])->name('manageaccount');
Route::get('/managedocument', [AdminViewsController::class, 'managedocument'])->name('managedocument');
Route::post('/managedocument', [AdminViewsController::class, 'modifydocument'])->name('modifydocument');
Route::get('/addnewaccount', [AdminViewsController::class, 'addnewaccount'])->name('addnewaccount');
Route::get('/addnewdocument', [AdminViewsController::class, 'addnewdocument'])->name('addnewdocument');

//Auth::routes(['register' => false]);
Auth::routes();
