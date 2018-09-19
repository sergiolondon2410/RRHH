<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id');
            $table->integer('evaluation_id');
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['application_id', 'evaluation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_evaluation');
    }
}
