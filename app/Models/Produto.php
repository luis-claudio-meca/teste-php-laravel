<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'tb_produto';

    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'id_categoria_produto',
        'data_cadastro',
        'nome_produto',
        'valor_produto',
    ];
    

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id_categoria_planejamento', 'id_categoria_produto');
    }
}
