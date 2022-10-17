<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criando a fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            //remover a coluna motivo_contato agora que estará vazia
            $table->dropColumn('motivo_contato');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criar novamente a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            //remover a fk padrão Laravel: '<table>_<coluna>_<foreign>
            $table->dropForeign('site_contato_motivo_contatos_id_foreign');
        });

        //atribuindo motivo_contatos_id para a nova coluna motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            //remover a coluna motivo_contatos_id
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
