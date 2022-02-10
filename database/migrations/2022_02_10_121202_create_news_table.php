<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position');
            $table->boolean('status')->default(true);
            $table->string('slug')->unique();
            $table->string('image')->unique();
            $table->string('title')->unique();
            $table->text('text');
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
