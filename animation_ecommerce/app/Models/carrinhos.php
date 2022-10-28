<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tamanhos;

class carrinhos extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['id','image','nome_produto','descricao_produto','valor_produto','tamanho_produto'];

    public function Carrinhos()
    {
        return $this->belongsTo(tamanhos::class);
    }
}