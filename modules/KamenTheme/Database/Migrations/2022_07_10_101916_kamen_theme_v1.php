<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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

        Schema::create('vission_mission', function (Blueprint $table) {
            $table->id();
            $table->text('vission');
            $table->text('mission');
            $table->commonFields();
        });

        Schema::create('vission_mission_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vission_mission')->constrained('vission_mission')->onDelete('cascade');
            $table->string('icon');
            $table->tinyText('text');
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
        Schema::dropIfExists('vission_mission_details');
        Schema::dropIfExists('vission_mission');
        Schema::dropIfExists('setting_media_socials');
    }
};
