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
        Schema::create('r_s_menus', function (Blueprint $table) {
            $table->id();

            $table->foreignId("rsp_id");
            $table->foreign("rsp_id")
                ->on("reservation_service_profiles")
                ->references("id")
                ->onDelete("cascade");

            $table->foreignId("category_id");
            $table->foreign("category_id")
                ->on("r_s_categories")
                ->references("id")
                ->onDelete("cascade");
            $table->string("name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_s_menus');
    }
};
