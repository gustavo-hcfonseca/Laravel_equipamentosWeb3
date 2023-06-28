@extends('template')

@section('conteudo')
  <h1>Listagem de Fabricantes</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <a href="relatorio" class="btn btn-primary">Relatório</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Figura</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($fabricantes as $fabricante)
          <tr>
            <td>{{$fabricante->id}}</td>
            <td>
              @if ($fabricante->imagem != "")
                <img style="width: 100px;" src="/storage/imagens/{{$fabricante->imagem}}">
              @endif            </td>
            <td>{{$fabricante->nome}}</td>
            <td>{{$fabricante->email}}</td>
            <td><a class='btn btn-primary' href='editar/{{$fabricante->id}}'>Editar</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$fabricante->id}}'>Excluir</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
@endsection
