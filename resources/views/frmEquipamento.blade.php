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

  <h1>Cadastro de Equipamentos</h1>
  @if ($equipamento->imagem != "")
    <img style="width: 200px;height:200px;object-fit:cover" src="/storage/imagens/{{$equipamento->imagem}}">
  @endif


  <form action="{{url('equipamento/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$equipamento->id}}">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" value="{{old('nome', $equipamento->nome)}}">
      @error('nome')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <input class="form-control @error('descricao') is-invalid @enderror" type="text" name="descricao" value="{{old('descricao', $equipamento->descricao)}}">
      @error('descricao')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>
    <div class="mb-3">
      <label for="data" class="form-label">Data</label>
      <input class="form-control @error('data') is-invalid @enderror" type="date" name="data" value="{{old('data', $equipamento->data->format('Y-m-d'))}}">
      @error('data')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>
    <div class="mb-3">
      <label for="fabricante" class="form-label">Fabricante</label>
      <select class="form-select @error('fabricante_id') is-invalid @enderror" name="fabricante_id">
        @foreach($fabricantes as $fabricante)
          <option {{ $fabricante->id == old('fabricante_id', $equipamento->fabricante_id) ?'selected': ''}} value="{{$fabricante->id}} ">{{$fabricante->nome}}</option>
        @endforeach
      </select>
      @error('fabricante_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>
    <div class="mb-3">
      <label for="categoria_id" class="form-label">Categoria</label>
      <select class="form-select @error('categoria_id') is-invalid @enderror" name="categoria_id">
        @foreach($categorias as $categoria)
          <option {{ $categoria->id == old('categoria_id', $equipamento->categoria_id) ?'selected': ''}} value="{{$categoria->id}} ">{{$categoria->descricao}}</option>
        @endforeach
      </select>
      @error('categoria_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>
    <div class="mb-3">
      <label for="arquivo" class="form-label">Figura</label>
      <input class="form-control" type="file" name="arquivo" accept="image/*">
    </div>

    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
