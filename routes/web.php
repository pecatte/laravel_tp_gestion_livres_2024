<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Categorie;

use App\Http\Controllers\LivreController;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/liste',     [LivreController::class, 'liste']);
Route::get('/meslivres', [LivreController::class, 'meslivres']);
Route::get('/ajouter',   [LivreController::class, 'ajouterForm']);
Route::post('ajout',     [LivreController::class, 'ajouterBD'] );
Route::get('/recherche', [LivreController::class, 'recherche'] );
Route::get('supprimer',  [LivreController::class, 'delete'] );
Route::get('modifier',   [LivreController::class, 'modifierForm']);
Route::post('modif',     [LivreController::class, 'modifierBD']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
