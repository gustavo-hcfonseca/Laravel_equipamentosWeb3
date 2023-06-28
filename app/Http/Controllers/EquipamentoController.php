<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Categoria;
use App\Models\Fabricante;
use App\Http\Requests\EquipamentoRequest;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class EquipamentoController extends Controller
{
    function listar() {
        $equipamentos = Equipamento::orderByRaw('data, id')->paginate(5);
        return view('listagemEquipamento',
                    compact('equipamentos'));
       }
    
       function novo() {
         $equipamento = new Equipamento();
         $equipamento->id = 0;
         $equipamento->data = now();
         $categorias = Categoria::orderBy('descricao')->get();
         $fabricantes = Fabricante::orderBy('nome')->get();
         return view('frmEquipamento', compact('equipamento', 'categorias', 'fabricantes'));
       }
    
       function salvar(EquipamentoRequest $request) {
    
         if ($request->input('id') == 0) {
           $equipamento = new Equipamento();
         } else {
           $equipamento = Equipamento::find($request->input('id'));
         }
         if ($request->hasFile('arquivo')) {
             $file = $request->file('arquivo');
             $upload = $file->store('public/imagens');
             $upload = explode("/", $upload);
             $tamanho = sizeof($upload);
             if ($equipamento->imagem != "") {
               Storage::delete("public/imagens/".$equipamento->imagem);
             }
             $equipamento->imagem = $upload[$tamanho-1];
         }
    
         $equipamento->nome = $request->input('nome');
         $equipamento->descricao = $request->input('descricao');
         $equipamento->fabricante_id = $request->input('fabricante_id');
         $equipamento->data = $request->input('data');
         $equipamento->categoria_id = $request->input('categoria_id');
         $equipamento->save();
         return redirect('equipamento/listar')
         ->with(['msg' => "Equipamento '$equipamento->nome' foi salvo!"]);
       }
    
    
    
       function salvarOld(Request $request) {
         $validated = $request->validate([
                 'nome' => 'required',
                 'texto' => 'required',
                 'data' => 'required',
                 'fabricante_id' => 'required|exists:fabricante,id',
                 'categoria_id' => 'required|exists:categoria,id'
             ]);
    
         if ($request->input('id') == 0) {
           $equipamento = new Equipamento();
         } else {
           $equipamento = Equipamento::find($request->input('id'));
         }
         $equipamento->nome = $request->input('nome');
         $equipamento->descricao = $request->input('descricao');
         $equipamento->fabricante_id = $request->input('fabricante_id');
         $equipamento->data = $request->input('data');
         $equipamento->categoria_id = $request->input('categoria_id');
         $equipamento->save();
         return redirect('equipamento/listar');
       }
    
       function editar($id) {
         $equipamento = Equipamento::find($id);
         $categorias = Categoria::orderBy('descricao')->get();
         $fabricantes = Fabricante::orderBy('nome')->get();
         return view('frmEquipamento', compact('equipamento', 'categorias', 'fabricantes'));
       }
    
       function excluir($id) {
         $equipamento = Equipamento::find($id);
         $nome = $equipamento->nome;
         if ($equipamento->imagem != "") {
           Storage::delete("public/imagens/".$equipamento->imagem);
         }
    
         $equipamento->delete();
    
         return redirect('equipamento/listar')
            ->with(['msg' => "Equipamento $nome foi excluído!"]);
       }
       function relatorio()
       {
           $equipamentos = Equipamento::orderBy('nome')->get();
           $pdf = Pdf::loadView('relatorioEquipamento', compact('equipamentos'));
           return $pdf->download('equipamentos.pdf');
       }
}
