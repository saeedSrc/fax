<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->text('question');
            $table->string('question_image')->nullable(true);
            $table->text('answer')->nullable(true);
            $table->text('answer_image')->nullable(true);
            $table->rememberToken();
            $table->timestampsTz();
            $table->timestampTz("question_time")->default(now());
            $table->timestampTz("answer_time")->default(now());


            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets_messages', function (Blueprint $table) {
            //
        });
    }
}
