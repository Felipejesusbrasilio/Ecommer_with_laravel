<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tamanhos;

class produtos extends Model
{
    use HasFactory;

    protected $fillable = ['image','nome_produto','descricao_produto','valor_produto'];

    public function product()
    {
        return $this->hasOne(tamanhos::class);
    }

}
