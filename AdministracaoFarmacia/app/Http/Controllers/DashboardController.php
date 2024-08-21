<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $produtos = Produto::query()
            ->when($search, function ($query, $search) {
                $search = strtolower($search); // Converta a pesquisa para minúsculas
                return $query->whereRaw('LOWER(nome) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(descricao) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(categoria) LIKE ?', ["%{$search}%"]);
            })
            ->get();

        return view('usuarios.dashboard', compact('produtos'));
    }
}
