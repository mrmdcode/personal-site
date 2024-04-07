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
        Schema::create('r_s_menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("r_s_menu_id");
            $table->foreign("r_s_menu_id")
                ->on("r_s_menus")
                ->references("id")
                ->onDelete("cascade");
            $table->string("name");
            $table->string("description");
            $table->string("price");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_s_menu_items');
    }
};
