@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="my-4">Detalhes da Vaga</h1>

    <div class="form-group">
        <strong>Título:</strong>
        {{ $vaga->titulo}}
    </div>

    <div class="form-group">
        <strong>Setor:</strong>
        {{ $vaga->setor}}
    </div>

    <div class="form-group">
        <strong>Remuneração:</strong>
        {{ $vaga->remuneracao}}
    </div>

    <div class="form-group">
        <strong>Empresa:</strong>
        {{ $vaga->empresa}}
    </div>

    <a class="btn btn-primary" href="{{ route('vagas.index')}}">Voltar</a>
</div>