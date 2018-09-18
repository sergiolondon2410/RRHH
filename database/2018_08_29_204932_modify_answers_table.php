<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            // $table->dropForeign('answers_implementation_question_id_foreign');
            // $table->dropColumn('implementation_question_id');
            // $table->dropForeign('answers_user_id_foreign');
            // $table->dropColumn('user_id');
            // $table->integer('evaluation_question_id')->unsigned()->default(1);
            $table->foreign('evaluation_question_id')->references('id')->on('evaluation_questions');
            // $table->integer('application_id')->unsigned()->default(1);
            $table->foreign('application_id')->references('id')->on('applications');
            // $table->string('description')->nullable();
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
            // $table->dropColumn('description');
            // $table->dropColumn('application_id');
            // $table->dropColumn('evaluation_question_id');
            // $table->integer('user_id')->unsigned()->default(1);
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->integer('implementation_question')->unsigned()->default(1);
            // $table->foreign('implementation_question')->references('id')->on('implementation_questions');
        });
    }
}
