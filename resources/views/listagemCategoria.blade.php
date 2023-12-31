@extends('template')

@section('conteudo')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif


  <h1>Listagem de Categorias</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <a href="relatorio" class="btn btn-primary">Relatório</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Figura</th>
        <th>Descrição</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($categorias as $categoria)
          <tr>
            <td>{{$categoria->id}}</td>
            <td >
              @if ($categoria->imagem != "")
                <img style="width: 100px; max-width: 100%; max-height: 100%;" src="/storage/imagens/{{$categoria->imagem}}">
              @endif            </td>
            <td>{{$categoria->descricao}}</td>
            <td><a class='btn btn-primary' href='editar/{{$categoria->id}}'>Editar</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$categoria->id}}'>Excluir</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
@endsection
