<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
USE App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br/>';
        echo $request->input('email');
        */
        /*
        
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */
        //$contato = new SiteContato();
        //$contato->fill($request->all());
        //$contato->save();
        //$contato->create($request->all());

        $motivo_contatos = MotivoContato::all();
        

        return view('site.contato', ['titulo'=>'Contato', 'motivo_contatos'=>$motivo_contatos]);
    }
    
    public function salvar(Request $request){

        $regras = [
            'nome'=>'required|min:3|max:40',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:200',

        ];

        $feedback =  [
            'required' => 'O campo :attribute precisa ser preenchido',
            'nome.min' => 'O nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O nome precisa ter no maximo 40 caracteres',
            'email'=> 'Por favor, preencha um email valido',
            'mensagem.max'=> 'A mensagem deve ter no maximo 200 caracteres'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        
        return redirect()->route('site.index');
    }
}
