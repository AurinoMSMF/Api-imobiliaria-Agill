<?php

use App\Http\Controllers\api\ImovelController;

Route::get('imoveis',[ImovelController::class, 'index']);

Route::post('imoveis',[ImovelController::class, 'store']);

Route::get('imoveis/{id}',[ImovelController::class, 'show']);

Route::get('imoveis/{id}/editar',[ImovelController::class, 'edit']);

Route::put('imoveis/{id}/editar',[ImovelController::class, 'update']);

Route::delete('imoveis/{id}/excluir',[ImovelController::class, 'destroy']);

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/api', [ImovelController::class, 'index']);

Route::get('/api/imoveis/locar', [ImovelController::class, 'locar']);

Route::get('/api/imoveis/cadastrar', [ImovelController::class, 'cadastrarImovel']);

Route::get('/api/imoveis', [ImovelController::class, 'verImoveis']);

Route::get('/api/imoveis/{id}', [ImovelController::class, 'verImovelUnico']);

Route::post('/api/imoveis', [ImovelController::class, 'store']);

Route::delete('/api/imoveis/{id}', [ImovelController::class,'apagarImovel']);*/