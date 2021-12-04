<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VenteController;
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
    return view('home');
});




Route::resource('produits', ProduitController::class);
Route::resource('clients', ClientController::class);
Route::resource('ventes', VenteController::class);
Route::get('statistiqueVente', [VenteController::class , 'venteByProducts'])->name('statistiqueVente');

Route::get('export', [ProduitController::class, 'export'])->name('export');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
