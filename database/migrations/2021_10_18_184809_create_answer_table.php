<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //mhoudl write answers instead of answer to make it easier, otherwise change name in php admin
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('qid');
            $table->string('name');
            $table->string('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
