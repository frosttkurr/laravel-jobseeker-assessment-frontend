<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;

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

Route::group(['prefix' => 'candidates', 'as' => 'candidates.'], function () {
    Route::get('/', [CandidateController::class,'index'])->name('index');
    Route::delete('/destroy/{id}', [CandidateController::class,'destroy'])->name('destroy');
    Route::get('/show/{id}', [CandidateController::class,'show'])->name('show');
    Route::get('/edit/{id}', [CandidateController::class,'edit'])->name('edit');
    Route::get('/create', [CandidateController::class,'create'])->name('create');
    Route::post('/store', [CandidateController::class,'store'])->name('store');
    Route::put('/update/{id}', [CandidateController::class,'update'])->name('update');
});