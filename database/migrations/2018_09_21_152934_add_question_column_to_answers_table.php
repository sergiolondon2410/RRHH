<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionColumnToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign('answers_evaluation_question_id_foreign');
            $table->dropColumn('evaluation_question_id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->unique(['application_id', 'question_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropUnique('answers_application_id_question_id_unique');
            $table->dropForeign('answers_question_id_foreign');
            $table->dropColumn('question_id');
            $table->integer('evaluation_question_id')->unsigned()->default(1);
            $table->foreign('evaluation_question_id')->references('id')->on('evaluation_question');
        });
    }
}
