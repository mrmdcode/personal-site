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
        Schema::create('r_s_item_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('r_s_order_id');
            $table->unsignedBiginteger('r_s_menu_item_id');
            $table->unsignedBiginteger('qty');

            $table->foreign('r_s_order_id')->references('id')
                ->on('r_s_orders')->onDelete('cascade');
            $table->foreign('r_s_menu_item_id')->references('id')
                ->on('r_s_menu_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_s_item_order');
    }
};
