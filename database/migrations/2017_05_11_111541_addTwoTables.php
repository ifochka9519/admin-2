<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class AddTwoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Model::unguard();
        Schema::create('histories',function(Blueprint $table){
            $table->increments("id");
            $table->timestamps();
            $table->softDeletes();
        });

        Model::unguard();
        Schema::create('discounts',function(Blueprint $table){
            $table->increments("id");
            $table->string("name")->nullable();
            $table->string("about")->nullable();
            $table->timestamps();
            $table->softDeletes();
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
