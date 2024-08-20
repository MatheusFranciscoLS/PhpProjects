<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class HomeController extends Controller
{
    public function index(){
        //Pegue os 5 produtos mais recentes, por exemplo
        $produtos = Produto::take(5)->get();
        return view('home', compact('produtos'));
    }
}
