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
        Schema::create('panel_nfcs', function (Blueprint $table) {
            $table->id();
            $table->string("key",255);
            $table->string("Image")->default("public/nfc/Images/default.png");
            $table->string("Name")->nullable();
            $table->string("Phone")->nullable();
            $table->string("Instagram")->nullable();
            $table->string("Telegram")->nullable();
            $table->string("Rubika")->nullable();
            $table->string("Twitter")->nullable();
            $table->string("WhatsApp")->nullable();
            $table->string("Linkedin")->nullable();
            $table->string("Website")->nullable();
            $table->string("Theme");
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
        Schema::dropIfExists('panel_nfcs');
    }
};
