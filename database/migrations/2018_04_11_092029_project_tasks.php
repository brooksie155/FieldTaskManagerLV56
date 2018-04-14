<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('descrition')->nullable();
            $table->enum('type', ['video','diary','survey','question']);
            $table->integer('project_id');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('project_tasks');
    }
}
