<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganisasiController;

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

Route::get('/', [ArticleController::class, 'welcome'])->name('welcome');

// Login routes
Route::get('login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login']);

// Register routes
Route::get('register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'register']);

// Dashboard route
Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

// Article routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
    
});

Route::get('/articles', [ArticleController::class, 'showlist'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');


//route organisasi
Route::resource('organisasi', OrganisasiController::class);

// Logout route
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
