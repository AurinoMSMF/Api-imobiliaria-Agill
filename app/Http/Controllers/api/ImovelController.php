<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imovel;

class ImovelController extends Controller
{

    public function index()
    {
        $imoveis = Imovel::all();

        if($imoveis->count()>0){
            return response()->json([
                'status' => 200,
                'imoveis' => $imoveis
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'imoveis' => 'Nenhum imóvel encontrado.'
            ],404);
        }
    }

    public function store(Request $request)
    {
        $imovel=Imovel::create([
            'idDono' => $request->idDono,
            'titulo' => $request->titulo,
            'val_diaria' => $request->val_diaria,
            'CEP' => $request->CEP,
            'descricao' => $request->descricao,
            'caracteristicas' => $request->caracteristicas,
            'max_pessoas' => $request->max_pessoas,
            'min_dias' => $request->min_dias
        ]);

        if($imovel){
            return response()->json([
                'status' => 200,
                'message' => "Imóvel cadastrado com sucesso." 
            ],200);
        }else{
            return response()->json([
                'status' => 500,
                'message' => "Ops... Algo errado." 
            ],500);
        }

    }

    public function show(string $id)
    {
        $imovel=Imovel::findOrFail($id);
        if($imovel){
            return response()->json([
                'status' => 200,
                'message' => $imovel
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Nenhum imóvel encontrado."
            ],404);
        }
    }

    public function edit(int $id)
    {
        $imovel=Imovel::findOrFail($id);
        if($imovel){
            return response()->json([
                'status' => 200,
                'message' => $imovel
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Nenhum imóvel encontrado."
            ],404);
        }
    }

    public function update(Request $request, int $id)
    {
        $imovel=Imovel::findOrFail($id);
        if($imovel){
            $imovel->update([
                'idDono' => $request->idDono,
                'titulo' => $request->titulo,
                'val_diaria' => $request->val_diaria,
                'CEP' => $request->CEP,
                'descricao' => $request->descricao,
                'caracteristicas' => $request->caracteristicas,
                'max_pessoas' => $request->max_pessoas,
                'min_dias' => $request->min_dias
            ]);
            return response()->json([
                'status' => 200,
                'message' => "Imóvel atualizado com sucesso." 
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "Imóvel não encontrado." 
            ],404);
        }

    }

    public function destroy(int $id)
    {
        $imovel=Imovel::findOrFail($id);
        if($imovel){
            $imovel->delete();
            return response()->json([
                'status' => 200,
                'message' => "Imóvel excluido com sucesso."
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "Imóvel não encontrado."
            ],404);
        }
    }
}
