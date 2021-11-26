<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use Carbon\Carbon;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return response()->json(['produtos' => $produtos], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $produto = Produto::create([
                'nome_produto' => $request->nome,
                'valor_produto' => $request->valor,
                'id_categoria_produto' => $request->categoriaId,
                'data_cadastro' => Carbon::now()
            ]);
            return response()->json(['produto' => $produto], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($produtoId)
    {
        try {
            $produto = Produto::has('categoria')
                ->where('id_produto', $produtoId)
                ->get();

            return response()->json(['produto' => $produto[0], 'categoria' => $produto[0]->categoria], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($produtoId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $produtoId)
    {
        try {
            $produto = Produto::updateOrCreate(
                ['id_produto' => $produtoId],
                [
                    'id_categoria_produto' => $request->categoriaId,
                    'nome_produto' => $request->nome,
                    'valor_produto' => $request->valor,
                ]
            );


            return response()->json(['produto' => $produto], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($produtoId)
    {
        try {
            Produto::destroy($produtoId);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return response()->json(['message' => "Deletado com sucesso!"], 200);
    }
}
