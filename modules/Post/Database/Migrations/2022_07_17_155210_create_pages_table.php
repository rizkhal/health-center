<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->commonFields();
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
