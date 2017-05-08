<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('clients', function (Blueprint $table){
            $table->dropForeign('clients_managers_id_foreign');
        });*/
       /* Schema::table('orders', function (Blueprint $table){
            $table->dropForeign('orders_poland_id_foreign');
        });
        Schema::table('partners', function (Blueprint $table){
            $table->dropForeign('partners_poland_id_foreign');
        });*/
       /* Schema::table('orders', function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });*/


        Schema::table('clients', function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('partners', function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
