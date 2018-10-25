<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('question');
                $table->integer('questionair_id')->unsigned()->index()->nullable();
                $table->integer('question_type_id')->unsigned()->index()->nullable();
                $table->timestamps();
            });

            Schema::table('questions', function (Blueprint $table) {

                $table->foreign('question_type_id')
                    ->references('id')->on('question_types')
                    ->onDelete('cascade');
            });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
