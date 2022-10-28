<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\carrinhos;
use App\Models\tamanhos;

class tamanhos extends Model
{
    use HasFactory;

    protected $fillable = ['tamanhos'];

    public $timestamps = false;

    public function Tamanhos()
    {
        return $this->hasOne(carrinhos::class);
    }

}