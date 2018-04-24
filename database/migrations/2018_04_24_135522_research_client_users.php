<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResearchClientUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_client_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_client_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('totp')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
            $table->index('research_client_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_client_users');
    }
}
