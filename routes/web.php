<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\TestController;
use App\Http\Controllers\EtudiantController;
Route::get('/test-db', [TestController::class, "testConnection"]);
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::post('/etudiant/create/etudiant', [EtudiantController::class, 'create'])->name('etudiant.create');
