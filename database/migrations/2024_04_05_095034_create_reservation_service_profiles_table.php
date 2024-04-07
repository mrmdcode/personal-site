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
        Schema::create('reservation_service_profiles', function (Blueprint $table) {
            $table->id();
            $table->string("companyName");
            $table->foreignId("admin_user_id")->unique();
            $table->foreign("admin_user_id")->on("users")->references("id")->onDelete("cascade");
            $table->string("informationPhone");
            $table->string("informationActivity");
            $table->string("informationSmTel")->nullable();
            $table->string("informationSmIns")->nullable();
            $table->string("informationSmWh")->nullable();
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
        Schema::dropIfExists('reservation_service_profiles');
    }
};
