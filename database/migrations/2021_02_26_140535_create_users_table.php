<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('province');
            $table->string('national_code');
            $table->integer('fax_shared_number');
            $table->string('password');
            $table->string('portal_password');
            $table->integer('pages')->default(0);
            $table->integer('send_pages')->default(0);
            $table->boolean('auth_check')->default(false);
            $table->enum('type', ['admin', 'normal'])->default("normal");
            $table->rememberToken();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
