<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;
use App\Http\Controllers\Site\EventosController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\CardapioController;
use App\Http\Controllers\Site\AdminController;
use App\Http\Controllers\Site\BannerController;
use App\Http\Controllers\Site\GaleriaController;
use App\Http\Controllers\Site\DepoimentoController;
use App\Http\Controllers\Site\TempoController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\ProdutoController;
use App\Http\Controllers\Site\CategoriaController;
use App\Http\Controllers\Site\ClienteController;
use App\Http\Controllers\Site\VendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/sobre', [SobreController::class, 'sobre'])-> name('sobre');

Route::get('/eventos', [EventosController::class, 'eventos'])->name('eventos');

Route::get('/cardapio', [CardapioController::class, 'cardapio'])->name('cardapio');

Route::get('/cardapio/categoria/{id_categoria}', [CardapioController::class, 'cardapio'])->name('cardapio.categoria');

Route::get('/contato', [ContatoController:: class, 'contato'])->name('contato');

Route::get('dash', [AdminController:: class, 'dash'])->name('dash');

Route::get('/banners', [BannerController::class, 'index'])->name('admin.banner.index');

Route::get('/galerias', [GaleriaController::class, 'galeria'])->name('admin.galeria.index');

Route::get('/depoimentos', [DepoimentoController::class, 'depoimento'])->name('admin.depoimento.index');

Route::get('/tempos', [TempoController::class, 'tempo'])->name('admin.tempo.index');

Route::get('news', [NewsController::class, 'news'])->name('admin.newsLetter.index');

Route::get('/produtos', [ProdutoController::class, 'produto'])->name('admin.produto.index');

Route::get('/categorias', [CategoriaController::class, 'categoria'])->name('admin.categoria.index');

Route::get('/clientes', [ClienteController::class, 'cliente'])->name('admin.cliente.index');

Route::get('/vendas', [VendaController::class, 'venda'])->name('admin.venda.index');