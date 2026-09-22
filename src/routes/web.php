<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;
use App\Http\Controllers\Site\EventosController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\CardapioController;
use App\Http\Controllers\Site\AdminController;
use App\Http\Controllers\Site\GaleriaController;
use App\Http\Controllers\Site\DepoimentoController;
use App\Http\Controllers\Site\TempoController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\ProdutoController;
use App\Http\Controllers\Site\CategoriaController;
use App\Http\Controllers\Site\ClienteController;
use App\Http\Controllers\Site\VendaController;
use App\Http\Controllers\Site\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// ROTAS WEB
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/sobre', [SobreController::class, 'sobre'])-> name('sobre');
Route::get('/eventos', [EventosController::class, 'eventos'])->name('eventos');
Route::get('/cardapio', [CardapioController::class, 'cardapio'])->name('cardapio');
Route::get('/cardapio/categoria/{id_categoria}', [CardapioController::class, 'cardapio'])->name('cardapio.categoria');
Route::get('/contato', [ContatoController:: class, 'contato'])->name('contato');

// ROTAS DASHBOARD

Route::middleware('guest')->group(function () {

    // Exibir tela de login
    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');

    // Processar login
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.auth');

});


/*
|--------------------------------------------------------------------------
| ÁREA RESTRITA
|--------------------------------------------------------------------------
|
| Todas as rotas deste grupo exigem autenticação.
|
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');


    /*
    |--------------------------------------------------------------------------
    | ROTAS ADMINISTRATIVAS
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')->group(function () {


        /*
        |--------------------------------------------------------------------------
        | CRUD BANNER
        |--------------------------------------------------------------------------
        */

        
    Route::get('/dashboard', [AdminController::class, 'dash'])
        ->name('dashboard');


        // Listar banners
        Route::get('/banner', [BannerController::class, 'index'])
            ->name('admin.banner.index');

        // Cadastrar banner
        Route::post('/banner', [BannerController::class, 'store'])
            ->name('admin.banner.store');

        // Editar banner
        // Route::get('/banner/{id}/editar', [BannerController::class, 'edit'])
        //     ->name('admin.banner.edit');

        // Atualizar banner
        Route::put('/banner/{id}', [BannerController::class, 'update'])
            ->name('admin.banner.update');

        // Ativar / desativar banner
        Route::patch('/banner/{id}', [BannerController::class, 'status'])
            ->name('admin.banner.status');


        /*
        |--------------------------------------------------------------------------
        | CRUD GALERIA
        |--------------------------------------------------------------------------
        */

        Route::get('/galeria', [GaleriaController::class, 'index'])
            ->name('admin.galeria.index');


        /*
        |--------------------------------------------------------------------------
        | CRUD PRODUTO
        |--------------------------------------------------------------------------
        */

        Route::get('/produto', [ProdutoController::class, 'index'])
            ->name('admin.produto.index');


        /*
        |--------------------------------------------------------------------------
        | CRUD CATEGORIA
        |--------------------------------------------------------------------------
        */
        Route::get('/categorias', [CategoriaController::class, 'categoria'])->name('admin.categoria.index');

        Route::post('/categorias', [CategoriaController::class, 'store'])->name('admin.categoria.store');

        Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('admin.categoria.update');

        Route::patch('/categorias/{id}', [CategoriaController::class, 'status'])->name('admin.categoria.status');

    });

});


Route::get('/depoimentos', [DepoimentoController::class, 'depoimento'])->name('admin.depoimento.index');
Route::get('/tempos', [TempoController::class, 'tempo'])->name('admin.tempo.index');
Route::get('news', [NewsController::class, 'news'])->name('admin.newsLetter.index');
Route::get('/clientes', [ClienteController::class, 'cliente'])->name('admin.cliente.index');
Route::get('/vendas', [VendaController::class, 'venda'])->name('admin.venda.index');