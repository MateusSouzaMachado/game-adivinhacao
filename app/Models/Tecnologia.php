<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    use HasFactory;

    protected $table = "tecnologia";
    
    protected $fillable = [
        "nome",
        "caminho_logo",
        "codigo"
    ];
}
