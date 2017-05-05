<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table){
            $table->double('payment');
            $table->double('prepayment');
            $table->string('passport');
            $table->string('scan_passport_path');
            $table->date('data_of_birthday');
            $table->string('phone');
            $table->string('email');
        });
        Schema::table('customers', function (Blueprint $table){
            $table->string('phone');
            $table->string('email');
        });
        Schema::table('orders', function (Blueprint $table){
            $table->double('payment');
            $table->double('prepayment');
        });
        Schema::table('polands', function (Blueprint $table){
            $table->string('address');
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
