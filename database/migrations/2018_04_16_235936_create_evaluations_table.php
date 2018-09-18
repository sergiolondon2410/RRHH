<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->mediumText('description');
            $table->integer('evaluation_type_id')->unsigned();
            $table->foreign('evaluation_type_id')->references('id')->on('evaluation_types');
            $table->integer('scale_id')->unsigned();
            $table->foreign('scale_id')->references('id')->on('scales');
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
        Schema::dropIfExists('evaluations');
    }
}
