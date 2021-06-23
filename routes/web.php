<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduitController;
// use App\Models\Produit;

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

Route::get('/users', [UserController::class, 'users']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/produit', [ProduitController::class, 'produit'])->name('produit');
Route::get('/produits', [ProduitController::class, 'produits']);
Route::get('/produit/{categorie}', [ProduitController::class, 'produitByCategorie']);


Route::get('/produits/{id}', [ProduitController::class, 'produitById']);
// Route::get('/produitByDate', [ProduitController::class, 'produitByDate']);
Route::put('/produit/{id}', [ProduitController::class, 'update']);
Route::delete('/produit/{id}', [ProduitController::class, 'delete']);

Route::get('/user/{id}', [userController::class, 'userById']);
Route::put('/user/{id}', [userController::class, 'update']);
Route::delete('/user/{id}', [userController::class, 'delete']);
