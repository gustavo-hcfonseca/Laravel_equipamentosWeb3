<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fabricante;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\FabricanteMensagem;
use Barryvdh\DomPDF\Facade\Pdf;

class FabricanteController extends Controller
{
    function listar()
    {
        $fabricantes = Fabricante::orderBy('nome')->get();
        return view(
            'listagemFabricante',
            compact('fabricantes')
        );
    }

    function novo()
    {
        $fabricante = new Fabricante();
        $fabricante->id = 0;
        return view('frmFabricante', compact('fabricante'));
    }

    function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $fabricante = new Fabricante();
        } else {
            $fabricante = Fabricante::find($request->input('id'));
        }
        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($fabricante->imagem != "") {
                Storage::delete("public/imagens/" . $fabricante->imagem);
            }
            $fabricante->imagem = $upload[$tamanho - 1];
        }


        $fabricante->nome = $request->input('nome');
        $fabricante->email = $request->input('email');
        $fabricante->save();
        return redirect('fabricante/listar');
    }

    function editar($id)
    {
        $fabricante = Fabricante::find($id);
        return view('frmFabricante', compact('fabricante'));
    }

    function excluir($id)
    {
        $fabricante = Fabricante::find($id);
        if ($fabricante->imagem != "") {
            Storage::delete("public/imagens/" . $fabricante->imagem);
        }
        $fabricante->delete();
        return redirect('fabricante/listar');
    }

    function relatorio()
    {
        $fabricantes = Fabricante::orderBy('nome')->get();
        $pdf = Pdf::loadView('relatorioFabricante', compact('fabricantes'));
        return $pdf->download('fabricantes.pdf');
    }
    /*
    function mensagem($id)
    {
        $fabricante = Fabricante::find($id);
        return view('frmMensagem', compact('fabricante'));

    }

    function enviarMensagem(Request $request)
    {
        $id = $request->input('id');
        $mensagem = $request->input('mensagem');
        $fabricante = Fabricante::find($id);
        Mail::to($fabricante->email)->send(new FabricanteMensagem($fabricante, $mensagem));
        return redirect('fabricante/listar');
    } */
}