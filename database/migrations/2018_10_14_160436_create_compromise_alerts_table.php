<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompromiseAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromise_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compromise_id')->unsigned();
            $table->foreign('compromise_id')->references('id')->on('compromises');
            $table->timestamp('date');
            $table->string('status')->default('pending');
            $table->softDeletes();
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
        Schema::dropIfExists('compromise_alerts');
    }
}
