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
        Schema::table("users", function(Blueprint $table) {
            $table->string("phone_number")->nullable()->after("email_verified_at");
            $table->string("first_name")->nullable()->after("phone_number");
            $table->string("surname")->nullable()->after("first_name");
            $table->boolean("administrator")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function(Blueprint $table) {
            $table->dropColumn("phone_number");
            $table->dropColumn("first_name");
            $table->dropColumn("surname");
        });
    }
};
