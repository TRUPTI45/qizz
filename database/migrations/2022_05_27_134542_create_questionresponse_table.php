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
        Schema::create('questionresponse', function (Blueprint $table) {
            $table->id('response_id');
            $table->integer('question_id');
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('email_id');
            $table->foreign('answer_id')->references('answer_id')->on('answer')->onDelete('cascade');
            $table->foreign('email_id')->references('id')->on('usermail')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionresponse');
    }
};
