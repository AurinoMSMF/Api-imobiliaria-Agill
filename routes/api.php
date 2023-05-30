<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ImovelController;
use App\Http\Controllers\api\LocacaoController;
use App\Models\User;
 
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
});

Route::post('/login', function (Request $request){
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user= Auth::user();
        $token=$user()->createToken('JWT');
        return response()->json($token,200);
    }
    return response()->json('Usuário inválido',401);
});

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