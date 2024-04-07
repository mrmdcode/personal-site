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
        Schema::create('r_s_p_template_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId("rsp_id")->unique();
            $table->foreign("rsp_id")
                ->on("reservation_service_profiles")
                ->references("id")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string('address');
            $table->string('icon');
            $table->string('title');
            $table->string('name');
            $table->string('slider_t');
            $table->string('slider_d',255);
            $table->string('sec_1_t',50);
            $table->string('sec_1_m',50);
            $table->text('sec_1_d');
            $table->string('sec_2_p_1_t',50);
            $table->string('sec_2_p_1_d',150);
            $table->string('sec_2_p_2_t',50);
            $table->string('sec_2_p_2_d',150);
            $table->string('sec_2_p_3_t',50);
            $table->string('sec_2_p_3_d',150);
            $table->string('sec_3_t',50);
            $table->string('sec_3_m',50);
            $table->string('sec_4_t',50);
            $table->string('sec_4_m',50);
            $table->string('sec_5_t',50);
            $table->string('sec_5_m',50);
            $table->text('sec_5_d');
            $table->string('s_1_i',255);
            $table->string('s_2_i',255);
            $table->string('s_3_i',255);
            $table->string('s_4_i',255);
            $table->string('s_5_i',255);
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
        Schema::dropIfExists('r_s_p_template_data');
    }
};
