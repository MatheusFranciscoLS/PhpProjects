@extends('layouts.app')

@section('home')

@section('content')
    <h1>Bem-vindo à Loja de Produtos</h1>
    <p>Explore nossa gama de produtos e entre em contato conosco para mais informações.</p>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/img1.jpg') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Primeiro Slide</h5>
                    <p>Descrição do primeiro slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/img2.jpg') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Segundo Slide</h5>
                    <p>Descrição do segundo slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/img3.jpg') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Terceiro Slide</h5>
                    <p>Descrição do terceiro slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
@endsection
