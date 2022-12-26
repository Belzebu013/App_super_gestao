<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criar coluna produtos  que vai receber a fk de fornecedores
        Schema::table('produtos', function(Blueprint $table){
            //criar registro
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor padrao SG',
                'site' => 'fornecedorpadraosg.com.br',
                'uf' => 'PR',
                'email' => 'fornecedorpadrao@contato.com'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
};
