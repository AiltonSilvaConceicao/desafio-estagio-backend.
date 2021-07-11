<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'indexCategory'])->name('init');
Route::get('/limit-search', [PagesController::class, 'indexLimit'])->name('limit-search');
Route::get('/content-search', [PagesController::class, 'indexContent'])->name('content-search');
Route::get('/ordem-search', [PagesController::class, 'indexOrdem'])->name('ordem-search');

Route::get('/search-filter-category/{category?}', [PagesController::class, 'searchRssCategory'])->name('search-filter-category');
Route::get('/search-filter-limit/{limit?}', [PagesController::class, 'searchRssLimit'])->name('search-filter-limit');
Route::get('/search-filter-content/{content?}', [PagesController::class, 'searchRssContent'])->name('search-filter-content');
Route::get('/search-filter-ordem/{ordem?}', [PagesController::class, 'searchRssOrdem'])->name('search-filter-ordem');


// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
