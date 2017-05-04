<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table){
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
        Schema::table('managers', function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('polands', function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('orders', function (Blueprint $table){
            $table->integer('poland_id')->unsigned();
            $table->foreign('poland_id')->references('id')->on('polands');
        });
        Schema::table('orders', function (Blueprint $table){
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
        });
        Schema::table('orders', function (Blueprint $table){
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');
        });
        Schema::table('orders', function (Blueprint $table){
            $table->integer('type_visa_id')->unsigned();
            $table->foreign('type_visa_id')->references('id')->on('typeofvisas');
        });
        Schema::table('partners', function (Blueprint $table){
            $table->integer('poland_id')->unsigned();
            $table->foreign('poland_id')->references('id')->on('polands');
        });
        Schema::table('clients', function (Blueprint $table){
            $table->integer('manager_id')->unsigned();
            $table->foreign('manager_id')->references('id')->on('managers');
        });
        Schema::table('clients', function (Blueprint $table){
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses');
        });
        Schema::table('districts', function (Blueprint $table){
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');
        });
        Schema::table('cities', function (Blueprint $table){
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts');
        });
        Schema::table('addresses', function (Blueprint $table){
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
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
