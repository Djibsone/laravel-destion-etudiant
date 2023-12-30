<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/etudiant', [EtudiantController::class, 'liste_etudiant'])->name('liste');
Route::get('/ajouter', [EtudiantController::class, 'ajouter_etudiant'])->name('add');
Route::post('/ajouter/traitement', [EtudiantController::class, 'store'])->name('store');
Route::get('/edit/{id}', [EtudiantController::class, 'edit_etudiant'])->name('edit');
Route::post('/edit/traitement', [EtudiantController::class, 'update_etudiant'])->name('update');
Route::get('/delete/{id}', [EtudiantController::class, 'delete_etudiant'])->name('delete');