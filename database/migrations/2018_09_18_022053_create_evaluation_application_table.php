<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_application', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluation_id');
            $table->integer('application_id');
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['evaluation_id', 'application_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_application');
    }
}
