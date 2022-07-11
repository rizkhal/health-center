<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('setting_hero', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyText('summary')->nullable();
            $table->commonFields();
        });

        Schema::create('setting_logo', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('logo_alternative')->nullable();
            $table->commonFields();
        });

        Schema::create('setting_media_socials', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('href');
            $table->string('icon')->comment('Only accept svg icon');
            $table->tinyInteger('target')->default(true)->comment('_blank');
            $table->commonFields();
        });
    }

    public function down()
    {
        Schema::dropIfExists('setting_hero');
        Schema::dropIfExists('setting_logo');
        Schema::dropIfExists('setting_media_socials');
    }
};
