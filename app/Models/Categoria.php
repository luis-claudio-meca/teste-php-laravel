<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    

    protected $table = 'tb_categoria_produto';

    protected $primaryKey = 'id_categoria_planejamento';

    protected $fillable = [
        'nome_categoria',
    ];
}
