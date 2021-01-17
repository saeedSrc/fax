<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->integer('page_counts');
            $table->integer('package_ttl');
            $table->string('package_ttl_text');
            $table->boolean('send_receive_fax')->default(true);
            $table->enum('number', ['dedicate', 'share'])->default("share");
            $table->enum('service', ['web', 'panel', 'email'])->default("email");
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
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
