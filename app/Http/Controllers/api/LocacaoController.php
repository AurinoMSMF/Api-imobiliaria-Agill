<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locacao;

class LocacaoController extends Controller
{
    public function index()
    {
        $locacoes = Locacao::all();

        if($locacoes->count()>0){
            return response()->json([
                'status' => 200,
                'locações' => $locacoes
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'locações' => 'Nenhuma locação encontrada.'
            ],404);
        }
    }

    public function store(Request $request)
    {
        $locacao=Locacao::create([
            'idImovel' => $request->idImovel,
            'idLocador' =>$request->idLocador,
            'idLocatario' =>$request->idLocatario,
            'locado' =>$request->locado
        ]);

        if($locacao){
            return response()->json([
                'status' => 200,
                'message' => "Locação realizada com sucesso." 
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
        $locacao=Locacao::findOrFail($id);
        if($locacao){
            return response()->json([
                'status' => 200,
                'message' => $locacao
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Locação não encontrada."
            ],404);
        }
    }

    public function edit(int $id)
    {
        $locacao=Locacao::findOrFail($id);
        if($locacao){
            return response()->json([
                'status' => 200,
                'message' => $locacao
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Locação não encontrada."
            ],404);
        }
    }

    public function update(Request $request, int $id)
    {
        $locacao=Locacao::findOrFail($id);
        if($locacao){
            $locacao->update([
                'idImovel' => $request->idImovel,
                'idLocador' =>$request->idLocador,
                'idLocatario' =>$request->idLocatario,
                'locado' =>$request->locado
            ]);
            return response()->json([
                'status' => 200,
                'message' => "Locação atualizada com sucesso." 
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "Locação não encontrada." 
            ],404);
        }

    }

    public function destroy(int $id)
    {
        $locacao=Locacao::findOrFail($id);
        if($locacao){
            $locacao->delete();
            return response()->json([
                'status' => 200,
                'message' => "Locação excluida com sucesso."
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "Locação não encontrada."
            ],404);
        }
    }
}
