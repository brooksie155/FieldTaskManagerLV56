<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaskRespondentsResponses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_id');
            $table->string('respondent_id');
            $table->string('project_id');
            $table->text('response');
            $table->boolean('complete');
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
            $table->index(['project_id','task_id','respondent_id']);
            $table->index('respondent_id','task_id');               
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_responses');
    }
}
