<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Research companies, i.e. Hope and Anchor, Kantar, Spinach 
 * - will require a login so they can review project progress 
 * ... project info, tasks, respondent list (anonyimised ?), responses
 */
class ResearchClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('research_clients');
    }
}
