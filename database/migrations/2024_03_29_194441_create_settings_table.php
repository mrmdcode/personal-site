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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("title",60);
            $table->string("icon",60);
            $table->string("myPic");
            $table->string("myName");
            $table->string("myPosition");
            $table->string("metaKeyword",160);
            $table->string("metaDescription",160);
            $table->string("metaAuthor");
            $table->string("metaCopyright");
            $table->string("metaRobots",255)->default("follow,index");
            $table->string("metaLang",10);
            $table->string("metaVoTitle");
            $table->string("metaVoDescription");
            $table->string("metaVoType");
            $table->string("metaVoUrl");
            $table->string("metaVoImage");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setings');
    }
};
