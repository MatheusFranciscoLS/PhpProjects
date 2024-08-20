<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
</head>
<body>
    @include('components.header')

    <div class="container">
        <h1>Adicionar Novo Produto</h1>
        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>
            </div>
            <div>
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" id="preco" name="preco" required>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" required>
            </div>
            <div>
                <button type="submit">Adicionar Produto</button>
            </div>
        </form>
    </div>

    @include('components.footer')
</body>
</html>
