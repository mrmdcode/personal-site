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
        Schema::create('r_s_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained('r_s_tables');
            $table->foreignId('reservation_service_profiles_id')->constrained('reservation_service_profiles');
            $table->foreignId('order_taker_id')->constrained('users');
            $table->enum('status', ['pending', 'accepted', 'rejected', 'cancelled'])->default('pending');
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
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
        Schema::dropIfExists('r_s_orders');
    }
};
