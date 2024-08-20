@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    @guest
    <h2>Bem-vindo à Loja de Ferramentas</h2>

    <p>Por favor, faça login ou registre-se para continuar.</p>
    @endguest

    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($produtos as $index => $produto)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="assets/img{{$index}}" class="d-block w-100" alt="{{ $produto->nome }}">
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

    @guest
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="/login" class="btn btn-primary btn-lg w-100">Login</a>
        </div>
        <div class="col-md-6">
            <a href="/registro" class="btn btn-secondary btn-lg w-100">Registrar-se</a>
        </div>
    </div>
    @endguest
</div>
@endsection