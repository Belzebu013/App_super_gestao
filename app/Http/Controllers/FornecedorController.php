<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0=>[
                'nome'=>'Fornecedor 1',
                'status'=>'N',
                'CNPJ'=>'00'
            ],
            1=>[
                'nome'=>'Fornecedor 2',
                'status'=>'S'
            ],
            2=>[
                'nome'=>'Fornecedor 3',
                'status'=>'S',
                'CNPJ'=>'000.000'
            ]
        ];

        //echo isset($fornecedores[0]['CNPJ'])?'CNPJ informado':'CNPJ não informado';

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
