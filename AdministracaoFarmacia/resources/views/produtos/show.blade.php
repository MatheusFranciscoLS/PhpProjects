@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Exibir mensagens de feedback -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <!-- Atualize o caminho da imagem para usar o caminho da imagem do produto -->
                <img src="{{ asset('assets/img/' . $produto->img) }}" class="img-fluid" alt="{{ $produto->nome }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $produto->nome }}</h2>
                <p>{{ $produto->categoria }}</p>
                <p>{{ $produto->descricao }}</p>
                <p>Preço: R$ {{ $produto->preco }}</p>

                <form method="POST" action="{{ route('carrinho.add', $produto->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Selecione a Quantidade</label>
                        <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
                </form>
            </div>
        </div>
    </div>
@endsection
