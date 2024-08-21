<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = ['id_user', 'id_produto', 'quantidade'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }
}
