<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->tinyText('description')->nullable();
            $table->commonFields();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->foreignUuid('category_id')->nullable();
            $table->unsignedBigInteger('visitor')->default(0);
            $table->commonFields();
        });

        Schema::create('imageable', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('url');
            $table->foreignUuid('imageable_id');
            $table->string('imageable_type');
        });

        Schema::create('subscribers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email');
            $table->string('name')->nullable();
            $table->timestamp('subscribe_at')->nullable();
            $table->timestamp('unsubscribe_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imageable');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('subscribers');
    }
};
