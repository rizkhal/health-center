<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->commonFields();
        });

        Schema::create('satisfactions', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->commonFields();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->commonFields();
        });

        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('satisfactions');
        Schema::dropIfExists('services');
        Schema::dropIfExists('informations');
    }
};
