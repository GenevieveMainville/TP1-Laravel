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


use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CustomAuthController;
Route::get('/test-db', [TestController::class, "testConnection"]);

Route::get('/', [CustomAuthController::class, 'dashboard']);
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/etudiant/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant/{etudiant}/edit', [EtudiantController::class, 'update']);



Route::get('article', [ArticleController::class, 'index'])->name('article')->middleware('auth');
Route::get('article/mesarticles', [ArticleController::class, 'mesArticles'])->name('mesarticles')->middleware('auth');
Route::get('/article/creer', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article/creer', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');
Route::get('/article/mesarticles/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');
Route::get('/article/mesarticles/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/article/mesarticles/{article}/edit', [ArticleController::class, 'update'])->middleware('auth');
Route::delete('/article/mesarticles/{article}', [ArticleController::class, 'destroy'])->middleware('auth');

Route::get('document', [DocumentController::class, 'index'])->name('document')->middleware('auth');
Route::get('/document/mesdocuments', [DocumentController::class, 'mesDocuments'])->name('mesdocuments')->middleware('auth');
Route::get('/document/creer', [DocumentController::class, 'create'])->name('document.create')->middleware('auth');
Route::post('/document/creer', [DocumentController::class, 'store'])->name('document.store')->middleware('auth');
Route::get('document/mesdocuments/{document}', [DocumentController::class, 'show'])->name('document.show')->middleware('auth');
Route::get('/document/mesdocuments/{document}/edit', [DocumentController::class, 'edit'])->name('document.edit');
Route::put('/document/mesdocuments/{document}/edit', [DocumentController::class, 'update'])->middleware('auth');
Route::delete('/document/mesdocuments/{document}', [DocumentController::class, 'destroy'])->middleware('auth');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');;
Route::post('custom-registration', [CustomAuthController::class, 'store'])->name('custom.registration');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth')->middleware('auth');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');;

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

Route::get('/article/{article}/PDF', [ArticleController::class, 'showPdf'])->name('article.pdf')->middleware('auth');