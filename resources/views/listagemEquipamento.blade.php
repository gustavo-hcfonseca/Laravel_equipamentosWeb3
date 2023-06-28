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



  <h1>Listagem de Equipamentos</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <a href="relatorio" class="btn btn-primary">Relatório</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Figura</th>
        <th>Nome</th>
        <th>Fabricante</th>
        <th>Data de inclusão</th>
        <th>Categoria</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($equipamentos as $equipamento)
          <tr>
            <td>{{$equipamento->id}}</td>
            <td>
              @if ($equipamento->imagem != "")
                <img style="width: 100px;" src="/storage/imagens/{{$equipamento->imagem}}">
              @endif            </td>
            <td>{{$equipamento->nome}}</td>
            <td>{{$equipamento->fabricante->nome}}</td> 
            <td>{{$equipamento->data->format('d/m/Y')}}</td>
            <td>{{$equipamento->categoria->descricao}}</td>
            <td><a class='btn btn-primary' href='editar/{{$equipamento->id}}'>Editar</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$equipamento->id}}'>Excluir</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
  {{ $equipamentos->links() }}
@endsection
