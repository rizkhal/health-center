<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('setting_media_socials', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('name')->comment('account name');
            $table->tinyInteger('type')->comment('fb, twitter, etc');
            $table->boolean('target')->default(true)->comment('_blank');
            $table->commonFields();
        });
    }

    public function down()
    {
        Schema::dropIfExists('setting_media_socials');
    }
};
