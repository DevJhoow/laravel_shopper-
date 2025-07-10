<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    
    protected $fillable = ['user_id', 'produto_id', 'quantidade', 'preco_unitario'];

    public function produto()
    {
        return $this->belongsTo(Produtos::class);
    }
}
