<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contatos = new SiteContato();
        $contatos->nome = 'Sitema SG';
        $contatos->telefone = '(11) 99999-9999';
        $contatos->email = 'contato@sg.com.br';
        $contatos->motivo_contato = 1;
        $contatos->mensagem = 'Seja bem vindo ao sistema';

        $contatos->save();
        */

        factory(App\Models\SiteContato::factory()->count(100))->create();
    }
}
