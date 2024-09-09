<?php

use App\Http\Controllers\InsertDataController;
use App\Http\Controllers\OutputDataController;
use Illuminate\Support\Facades\Route;


Route::get('/', [InsertDataController::class, 'index'])->name('form');
Route::post('/', [InsertDataController::class, 'store'])->name('form.post');
Route::get('/download', [InsertDataController::class, 'show'])->name('form.show');
Route::get('/edit/{id}', [InsertDataController::class, 'edit'])->name('form.edit');
Route::post('/update/{id}', [InsertDataController::class, 'update'])->name('form.update');


