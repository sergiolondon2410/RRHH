<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->dropForeign('applications_assignation_id_foreign');
            $table->dropColumn('assignation_id');
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
            $table->integer('assignation_id')->unsigned()->default(1);
            $table->foreign('assignation_id')->references('id')->on('assignations');
            $table->dropForeign('applications_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
