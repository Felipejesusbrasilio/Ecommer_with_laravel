<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ecommerce;

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

Route::get('/',[Ecommerce::class,'show_produtos']);

Route::get('/tamanhos/1',[Ecommerce::class,'add_tamanho38']);
Route::get('/tamanhos/2',[Ecommerce::class,'add_tamanho39']);
Route::get('/tamanhos/3',[Ecommerce::class,'add_tamanho40']);
Route::get('/tamanhos/4',[Ecommerce::class,'add_tamanho41']);
Route::get('/tamanhos/5',[Ecommerce::class,'add_tamanho42']);
Route::get('/tamanhos/6',[Ecommerce::class,'add_tamanho43']);

Route::get('/gestao',[Ecommerce::class,'show_view_gestao']);

Route::post('/post_gestao',[Ecommerce::class,'gestao_produtos']);

Route::get('/carrinho/{id}',[Ecommerce::class,'add_produts_for_car']);

Route::get('/carrinho',[Ecommerce::class,'page_car']);

Route::delete('/deletar/{id}',[Ecommerce::class,'deletando']);

Route::get('/error',[Ecommerce::class,'error']);

// aqui é a pagina do cadastro

Route::get('/cadastrar',[Ecommerce::class,'cadastrar']);
Route::post('/cadastro_sucesso',[Ecommerce::class,'cadastro_valido']);


// aqui é para coloca o metodo de pagamento
Route::get('/pagamento',[Ecommerce::class,'pagamento']);
Route::get('/voltar',[Ecommerce::class,'voltar']);

Route::delete('/deletar_show_produtos/{id}',[Ecommerce::class,'deletando_gestao_produtos']);

// aqui é caso o cliente quiser comprar só um produto

Route::get('/compre_ja/{id}',[Ecommerce::class,'compra_logo']);

Route::get('/gestao_email',[Ecommerce::class,'send_email']);
