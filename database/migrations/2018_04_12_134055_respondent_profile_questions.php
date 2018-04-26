<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RespondentProfileQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondent_profile_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('question_order');
            $table->string('question');
            $table->enum(
                'type', 
                ['text','select_one','select_multiple']
            );            
            $table->text('response_options')->nullable();
            $table->integer('minimum_requirement')->default(1);
            
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
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
        Schema::dropIfExists('respondent_profile_questions');
    }
}
