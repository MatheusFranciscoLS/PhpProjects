@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Carrinho de Compras</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($itens->isEmpty())
        <p>Seu carrinho está vazio.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itens as $item)
                    <tr>
                        <td>{{ $item->produto->nome }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>R$ {{ number_format($item->produto->preco, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($item->quantidade * $item->produto->preco, 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('carrinho.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <h3>Total: R$ {{ number_format($valorTotal, 2, ',', '.') }}</h3>
            <form action="{{ route('carrinho.finalizarCompra') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Finalizar Compra</button>
            </form>
        </div>
    @endif
</div>
@endsection
