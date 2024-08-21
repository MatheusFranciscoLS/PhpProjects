<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    //lista todos os produtos
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index',compact('produtos'));

    }

    //abre o formulario de cadastro
    public function create()
    {
        return view('produtos.create');
    }

    // envia o formulario de cadastro
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria' => 'required|string',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para a imagem
        ]);
    
        // Criar o produto
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->categoria = $request->categoria;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
    
        // Verifica se um arquivo de imagem foi enviado
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension(); // Nome do arquivo
            $request->img->move(public_path('assets/img'), $imageName); // Mover para o diretório público
            $produto->img = $imageName; // Salvar o nome da imagem no banco de dados
        } else {
            $produto->img = 'default.png'; // Opcional: definir uma imagem padrão
        }
    
        $produto->save(); // Salvar o produto
    
        return redirect()->route('produtos.index')
                         ->with('success', 'Produto Criado com Sucesso');
    }

    public function edit(Produto $produto)
{
    return view('produtos.edit', compact('produto'));
}

    
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria' => 'required|string',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para a imagem
        ]);
    
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->categoria = $request->categoria;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
    
        // Verifica se um novo arquivo de imagem foi enviado
        if ($request->hasFile('img')) {
            // Apagar a imagem antiga, se existir
            if ($produto->img && file_exists(public_path('assets/img/' . $produto->img))) {
                unlink(public_path('assets/img/' . $produto->img));
            }
    
            $imageName = time() . '.' . $request->img->extension(); // Nome do novo arquivo
            $request->img->move(public_path('assets/img'), $imageName); // Mover para o diretório público
            $produto->img = $imageName; // Atualizar o nome da imagem no banco de dados
        }
    
        $produto->save(); // Salvar as atualizações
    
        return redirect()->route('produtos.index')
                         ->with('success', 'Produto Atualizado com Sucesso');
    }
    
    

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->
        with('success','Produto Deletado com Sucesso');
    }

    //mostrar os produtos
    public function show(Produto $produto){
        return view('produtos.show', compact('produto'));
    }

    // Adiciona produto ao carrinho (exemplo)
public function addToCart(Request $request, $id)
{
    $produto = Produto::find($id);

    // Lógica para adicionar o produto ao carrinho
    // ...

    return redirect()->back()->with('success', 'Produto adicionado ao carrinho com sucesso!');
}


}