<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('package_1')->default(0);
            $table->integer('package_2')->default(0);
            $table->integer('package_3')->default(0);
            $table->integer('price')->default(0);
            $table->enum('pay', ['pending', 'success'])->default("pending");
            $table->timestampsTz();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
