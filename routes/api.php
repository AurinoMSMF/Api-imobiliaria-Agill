<?php

use App\Http\Controllers\api\ImovelController;
use App\Http\Controllers\api\LocacaoController;

Route::get('imoveis',[ImovelController::class, 'index']);

Route::post('imoveis',[ImovelController::class, 'store']);

Route::get('imoveis/{id}',[ImovelController::class, 'show']);

Route::get('imoveis/{id}/editar',[ImovelController::class, 'edit']);

Route::put('imoveis/{id}/editar',[ImovelController::class, 'update']);

Route::delete('imoveis/{id}/excluir',[ImovelController::class, 'destroy']);

Route::get('locacoes',[LocacaoController::class,'index']);

Route::post('locacoes',[LocacaoController::class, 'store']);

Route::get('locacoes/{id}',[LocacaoController::class, 'show']);

Route::get('locacoes/{id}/editar',[LocacaoController::class, 'edit']);

Route::put('locacoes/{id}/editar',[LocacaoController::class, 'update']);

Route::delete('locacoes/{id}/excluir',[LocacaoController::class, 'destroy']);