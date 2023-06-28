@extends('template')

@section('conteudo')
  <h1>Mensagem para o Fabricante</h1>
  @if ($fabricante->imagem != "")
    <img style="width: 200px;height:200px;object-fit:cover" src="/storage/imagens/{{$fabricante->imagem}}">
  @endif

  <form action="{{url('fabricante/mensagem')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$fabricante->id}}">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input readonly class="form-control" type="text" name="nome" value="{{$fabricante->nome}}">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input readonly class="form-control" type="email" name="email" value="{{$fabricante->email}}">
    </div>
    <div class="mb-3">
       <label for="mensagem">Mensagem</label>
       <textarea class="form-control" id="mensagem" name="mensagem" rows="10"></textarea>
     </div>
    <button class="btn btn-primary" type="submit" name="button">Enviar</button>
  </form>
@endsection
