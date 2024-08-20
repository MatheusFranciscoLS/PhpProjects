@extends('layouts.app')

@section( 'contato')

@section('content')
<div class="container">
    <h1>Contato</h1>
    <p>Entre em contato conosco através do formulário abaixo.</p>

    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="5" class="form-control" required></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>
@endsection
