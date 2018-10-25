<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('questionair_name');
            // $table->integer('q_noq');
            $table->string('duration');
            $table->string('minute_hour');
            $table->string('resumable');
            // $table->string('q_published');
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
        Schema::dropIfExists('questionairs');
    }
}
