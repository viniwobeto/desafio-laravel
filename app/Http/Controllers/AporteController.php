<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AporteController extends Controller
{
     public function store(Request $request)
    {
        $data = $request->validate([
            'data'  => ['required', 'date'],
            'valor' => ['required', 'numeric', 'min:0.01'],
            'ativo' => ['required', 'string'],
            'tipo'  => ['required', 'string'],
        ],

              [
        'valor.min' => 'O valor deve ser maior que zero.',
        'valor.numeric' => 'Valor não númerico',

             ],

    );


        return back();
    }
}
