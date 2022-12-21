<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos'; //nome da tabela no banco

    protected $fillable = ['nome','descricao','peso', 'unidade_id'];

    public function ItemDetalhe(){
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id');
    }

}
