<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->enum(
                'type', 
                ['video','audio','image','text','select_one','select_multiple']
            );
            $table->text('response_options')->nullable();
            $table->integer('minimum_requirement')->default(1);
            $table->integer('project_task_id');
            $table->integer('project_task_number');
            $table->string('summary');
            $table->string('description')->nullable();     
            $table->date('due')->nullable();       
            $table->dateTime('deleted_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->index('project_task_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
