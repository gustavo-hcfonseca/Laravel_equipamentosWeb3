<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Equipamento;

class NewsController extends Controller
{
    function index()
    {
        $categorias = Categoria::orderBy('descricao')->get();

        $ultimosEquipamentos = Equipamento::orderBy('data', 'desc')->limit(5)->get();

        return view('equipamentos', compact('categorias', 'ultimosEquipamentos'));
    }

    function equipamento($id)
    {
        $equipamentoAtual = Equipamento::find($id);
        $categorias = Categoria::orderBy('descricao')->get();
        $equipamentosCategoria = Equipamento::where(
            'categoria_id',
            $equipamentoAtual->categoria->id
        )->orderBy('data', 'desc')->paginate(5);
        return view('equipamento', compact('equipamentoAtual', 'categorias', 'equipamentosCategoria'));
    }

    function categoria($id)
    {
        $categorias = Categoria::orderBy('descricao')->get();
        $equipamentosCategoria = Equipamento::where(
            'categoria_id',
            $id
        )->orderBy('data', 'desc')->paginate(5);
        $equipamentoAtual = $equipamentosCategoria
            ->shift();
        return view('equipamento', compact('equipamentoAtual', 'categorias', 'equipamentosCategoria'));
    }
}