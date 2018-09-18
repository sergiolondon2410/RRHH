<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGiverIdColumnToAccomplishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accomplishments', function (Blueprint $table) {
            $table->integer('giver_id')->unsigned()->default(1);
            $table->foreign('giver_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accomplishments', function (Blueprint $table) {
            $table->dropForeign('accomplishments_giver_id_foreign');
            $table->dropColumn('giver_id');
        });
    }
}
