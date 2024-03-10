<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view("main", "main");
Route::view("about", "about");
Route::view("contacta", "contacta");

//Route::view("saludo", "saludo");
Route::get("react", \App\Http\Controllers\MainController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::resource("alumnos", AlumnoController::class);
Route::resource("profesores", \App\Http\Controllers\ProfesorController::class);

Route::get('/', function () {
    return view('main');
})->name('index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
