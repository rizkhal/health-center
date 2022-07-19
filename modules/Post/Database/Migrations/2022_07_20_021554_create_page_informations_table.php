<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hipertencies', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->commonFields();
        });

        Schema::create('phbs', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->commonFields();
        });

        Schema::create('service_schedules', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->commonFields();
        });

        Schema::create('bpjs', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->commonFields();
        });

        Schema::create('covid', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->commonFields();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hipertencies');
        Schema::dropIfExists('phbs');
        Schema::dropIfExists('service_schedules');
        Schema::dropIfExists('bpjs');
        Schema::dropIfExists('covid');
    }
};
