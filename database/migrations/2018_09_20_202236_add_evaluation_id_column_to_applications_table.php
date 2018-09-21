<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEvaluationIdColumnToApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->integer('evaluation_id')->unsigned()->default(1);
            $table->foreign('evaluation_id')->references('id')->on('evaluations');
            $table->unique(['evaluator_id', 'evaluation_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign('applications_evaluation_id_foreign');
            $table->dropColumn('evaluation_id');
        });
    }
}
