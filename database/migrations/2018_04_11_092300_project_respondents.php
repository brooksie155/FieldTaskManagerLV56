<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * profile details to be added (see updates on laptop)
 */

class ProjectRespondents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_project_respondents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('respondent_id');
            $table->integer('project_id');
            $table->timestamps();
            $table->index(['respondent_id','project_id']);
            $table->index('project_id');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('x_project_respondents');
    }
}
