<h3>Fornecedor</h3>

{{-- Comentario com sintaxe Blade--}}

@php
    //Comentario PHP

@endphp

@isset($fornecedores)
    @for($i=0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{$fornecedores[$i]['nome']}}
        <br>
        Status: {{$fornecedores[$i]['status']}}
        <br>
        CNPJ: {{$fornecedores[$i]['CNPJ'] ?? 'Dado nao preenchido'}}
        <hr/>
    @endfor
@endisset