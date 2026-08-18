<?php



use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;
use App\Http\Controllers\Site\EventosController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\CardapioController;
use App\Http\Controllers\Site\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/sobre', [SobreController::class, 'sobre'])-> name('sobre');

Route::get('/eventos', [EventosController::class, 'eventos'])->name('eventos');

Route::get('/cardapio', [CardapioController::class, 'cardapio'])->name('cardapio');

Route::get('/cardapio/categoria/{id_categoria}', [CardapioController::class, 'cardapio'])->name('cardapio.categoria');

Route::get('/contato', [ContatoController:: class, 'contato'])->name('contato');

Route::get('/dash', [AdminController:: class, 'dash'])->name('dash');