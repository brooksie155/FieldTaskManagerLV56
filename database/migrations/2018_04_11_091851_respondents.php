<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Respondents extends Migration
{
    /**
     * Run the migrations.
     *
     * Link respondent to project, profile may vary between projects (meh ?)
     * - does respondent require different login per project which may run concurrently?
     * - or should we try to use same login (email will probably be same) in which case 
     * can we merge profiles, or use an intermediary table to hold profiles on per respondent/project basis.
     * 
     * --- assume respondent data will be removed once project complete...
     * 
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('respondents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->tinyInteger('age');
            $table->enum('social_economic_grade', ['A', 'B', 'C1', 'C2', 'D', 'E']);
            $table->enum('gender', ['male','female','other']);
            $table->string('gender_other')->nullable();
            $table->text('profile')->nullable();  // data from screener form
            $table->integer('recruiter_id');
            $table->integer('project_id');   // keep different record per project (even if respondent is reused)
            $table->enum('duplicate_flag',['Y','N'])->default('N'); // if possible duplicate detected on current or recent projects (90 days)
            $table->integer('duplicate_respondent_id')->default(0);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
            $table->index('recruiter_id');
            $table->index(['project_id','recruiter_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respondents');
    }
}
