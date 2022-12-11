<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //metodo instancia objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor.com.br';
        $fornecedor->save();

        //metódo create
        Fornecedor::create([
            'nome'=>'Fornecedor 200',
            'uf'=>'SP', 
            'email'=>'contato@fornecedor200.com.br'
        ]);

        Fornecedor::create([
            'nome'=>'Fornecedor 300',
            'uf'=>'MG', 
            'email'=>'contato@fornecedor300.com.br'
        ]);

    }
}
