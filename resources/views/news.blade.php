@extends('templateNews')

@section('conteudo')
<main>
  <h1 style="color: blue;">Últimos Equipamentos</h1>
  <!-- carrossel -->
  <div id="carouselPrincipal" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach($ultimosEquipamentos as $equipamento)
      <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="{{$loop->index}}" class="active" aria-current="true" aria-label="Slide {{($loop->index+1)}}"></button>
      @endforeach
    </div>
    <div class="carousel-inner">
    @foreach($ultimosEquipamentos as $equipamento)
      <div class="carousel-item {{$loop->first?'active':''}} ratio" style="--bs-aspect-ratio: 20%;">
        <img src="/storage/imagens/{{$equipamento->imagem}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><a style="color:white" href="news/equipamento/{{$equipamento->id}}">{{$equipamento->nome}}</a></h5>
          <p style="font-size:0.75rem;">{{$equipamento->fabricante->nome}} - {{$equipamento->data->format('d/m/Y')}}</p>
        </div>
      </div>
    @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</main>
<div class="artigos">
  @foreach($categorias as $categoria)
  <article>
    <h1 style="color: green;">{{$categoria->descricao}}</h1>
    <!-- carrossel -->
    <div id="carousel-cat{{$loop->index}}" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        @foreach($categoria->equipamentos as $equipamento)
        <button type="button" data-bs-target="#carousel-cat{{$loop->parent->index}}" data-bs-slide-to="{{$loop->index}}" class="active" aria-current="true" aria-label="Slide {{($loop->index+1)}}"></button>
        @endforeach
      </div>
      <div class="carousel-inner">
        @foreach($categoria->equipamentos as $equipamento)
        <div class="carousel-item {{$loop->first?'active': ''}} ratio" style="--bs-aspect-ratio: 50%;">
          <img src="/storage/imagens/{{$equipamento->imagem}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5><a style="color:white" href='{{url("news/equipamento/$equipamento->id")}}'>{{$equipamento->nome}}</a></h5>
            <p style="font-size:0.75rem;">{{$equipamento->fabricante->nome}} - {{$equipamento->data->format('d/m/Y')}}</p>
          </div>
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carousel-cat{{$loop->index}}" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carousel-cat{{$loop->index}}" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </article>
  @endforeach
</div>
@endsection
