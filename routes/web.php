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

Route::get('/', [\App\Http\Controllers\PrincipalController::Class,'principal'])
    ->middleware('log.acesso')
    ->name('site.index');
    
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::Class,'sobreNos'])
    ->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::Class,'contato'])->name('site.contato');

Route::post('/contato', [\App\Http\Controllers\ContatoController::Class,'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])
    ->name('site.login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])
    ->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');

    Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');
    
    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::Class, 'index'])->name('app.fornecedor');

    Route::post('/fornecedor/listar', [App\Http\Controllers\FornecedorController::Class, 'listar'])->name('app.fornecedor.listar');

    Route::get('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::Class, 'adicionar'])->name('app.fornecedor.adicionar');

    Route::post('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::Class, 'adicionar'])->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/editar/{id}/{msg?}', [App\Http\Controllers\FornecedorController::Class, 'editar'])->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}', [App\Http\Controllers\FornecedorController::Class, 'excluir'])->name('app.fornecedor.excluir');

    //produto
    Route::resource('/produto', App\Http\Controllers\ProdutoController::class);

    //Produto Detalhes
    Route::resource('/produto-detalhe', App\Http\Controllers\ProdutoDetalheController::class);

    Route::resource('/cliente', App\Http\Controllers\ClienteController::class);
    
    Route::resource('/pedido', App\Http\Controllers\PedidoController ::class);

    //Route::resource('/pedido-produto', App\Http\Controllers\PedidoControllerController::class);

    Route::get('pedido-produto/create/{pedido}', [App\http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido-produto.create');

    Route::post('pedido-produto/store/{pedido}', [App\http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido-produto.store');

});

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::Class,'teste'])->name('teste');

Route::fallback(function(){
   echo "A rota acessada não existe. <a href=".route('site.index').">Clique aqui</a> para ir para a pagina inicial"; 
});


