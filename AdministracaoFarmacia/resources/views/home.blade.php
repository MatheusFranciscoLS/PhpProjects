@extends('layouts.app')

@section('styles')
    <!-- Adicione seus estilos personalizados aqui -->
@endsection

@section('content')
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner mt-5">
            <h1>Produtos em Destaques</h1>
            @foreach ($produtos as $index => $produto)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <!-- Atualize o caminho da imagem para usar o caminho da imagem do produto -->
                    <img src="{{ asset('assets/img/' . $produto->img) }}" class="d-block w-100" alt="{{ $produto->nome }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $produto->nome }}</h5>
                        <p>{{ $produto->descricao }}</p>
                        <p>Preço: R$ {{ $produto->preco }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
     <!-- Seção de Outros Produtos -->
     <div class="container mt-5">
        <h1>Outros Produtos</h1>
        <div class="row">
            @foreach ($produtos->where('em_destaque', false) as $produto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Pega o nome da imagem do banco de dados e ajusta o caminho -->
                        <img src="{{ asset('assets/img/' . $produto->img) }}" class="card-img-top" alt="{{ $produto->nome }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text">{{ $produto->descricao }}</p>
                            <p class="card-text">Preço: R$ {{ $produto->preco }}</p>
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-primary">Ver Produto</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
