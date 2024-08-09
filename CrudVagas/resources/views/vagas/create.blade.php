@extends('layouts.master')

@section('content')

<div class="container">
    <h1 class="my-4">Criar Produto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Houve alguns problemas com sua entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vagas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="setor" class="form-control" placeholder="Título">
        </div>
        <div class="form-group">
            <label for="setor">Setor:</label>
            <textarea name="setor" class="form-control" placeholder="Setor"></textarea>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" class="form-control" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group">
            <label for="remuneracao">Remuneração:</label>
            <textarea name="remuneracao" class="form-control" placeholder="Remuneração"></textarea>
        </div>

        <div class="form-group">
            <label for="empresa">Empresa:</label>
            <input type="text" name="empresa" class="form-control" placeholder="Remuneração">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
