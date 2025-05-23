<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("projects", function(Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description")->nullable();
            $table->string("links")->nullable();
            $table->string("programming_languages")->nullable();
            $table->string("tools")->nullable();
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
        Schema::dropIfExists("projects");
    }
};
