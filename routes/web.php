<?php

use App\Http\Controllers\TipSobeController;
use App\Http\Controllers\StudentskiDomController;
use App\Http\Controllers\SobaController;
use App\Http\Controllers\FakultetController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/tip_sobe', [TipSobeController::class, 'index'])->name('tip_sobe.index');
Route::get('/tip_sobe/create', [TipSobeController::class, 'create'])->name('tip_sobe.create');
Route::post('/tip_sobe/store', [TipSobeController::class, 'store'])->name('tip_sobe.store');
Route::get('/tip_sobe/{id}/edit', [TipSobeController::class, 'edit'])->name('tip_sobe.edit');
Route::delete('/tip_sobe/{id}', [TipSobeController::class, 'destroy'])->name('tip_sobe.destroy');
Route::patch('/tip_sobe/{id}', [TipSobeController::class, 'update'])->name('tip_sobe.update');

Route::get('/studentski_dom', [StudentskiDomController::class, 'index'])->name('studentski_dom.index');
Route::get('/studentski_dom/create', [StudentskiDomController::class, 'create'])->name('studentski_dom.create');
Route::post('/studentski_dom/store', [StudentskiDomController::class, 'store'])->name('studentski_dom.store');
Route::get('/studentski_dom/{id}/edit', [StudentskiDomController::class, 'edit'])->name('studentski_dom.edit');
Route::delete('/studentski_dom/{id}', [StudentskiDomController::class, 'destroy'])->name('studentski_dom.destroy');
Route::patch('/studentski_dom/{id}', [StudentskiDomController::class, 'update'])->name('studentski_dom.update');

Route::get('/soba', [SobaController::class, 'index'])->name('soba.index');
Route::get('/soba/create', [SobaController::class, 'create'])->name('soba.create');
Route::post('/soba/store', [SobaController::class, 'store'])->name('soba.store');
Route::get('/soba/{id}/edit', [SobaController::class, 'edit'])->name('soba.edit');
Route::delete('/soba/{id}', [SobaController::class, 'destroy'])->name('soba.destroy');
Route::patch('/soba/{id}', [SobaController::class, 'update'])->name('soba.update');

Route::get('/fakultet', [FakultetController::class, 'index'])->name('fakultet.index');
Route::get('/fakultet/create', [FakultetController::class, 'create'])->name('fakultet.create');
Route::post('/fakultet/store', [FakultetController::class, 'store'])->name('fakultet.store');
Route::get('/fakultet/{id}/edit', [FakultetController::class, 'edit'])->name('fakultet.edit');
Route::delete('/fakultet/{id}', [FakultetController::class, 'destroy'])->name('fakultet.destroy');
Route::patch('/fakultet/{id}', [FakultetController::class, 'update'])->name('fakultet.update');

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::patch('/student/{id}', [StudentController::class, 'update'])->name('student.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');