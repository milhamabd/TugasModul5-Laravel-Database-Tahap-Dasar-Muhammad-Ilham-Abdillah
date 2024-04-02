<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('home');   //untuk perpindah halaman home

Route::get('home', [HomeController::class, 'index'])->name('home'); 
Route::get('profile', ProfileController::class)->name('profile');
Route::resource('employees', EmployeeController::class);
