<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aporte extends Model
{
     protected $fillable = [
        'data_aporte',
        'valor',
        'ativo',
        'tipo',
    ];
}
