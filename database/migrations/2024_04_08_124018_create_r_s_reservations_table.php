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
        Schema::create('r_s_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->foreignId('rsp_id');
            $table->foreignId('r_s_table_id');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->string('message');
            $table->enum('status',['inProcess','expire'])
                ->default('inProcess');

            $table->foreign('rsp_id')
                ->on("reservation_service_profiles")
                ->references("id")
                ->onDelete("cascade");

            $table->foreign('r_s_table_id')
                ->on("r_s_tables")
                ->references("id")
                ->onDelete("cascade");


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
        Schema::dropIfExists('r_s_reservations');
    }
};
