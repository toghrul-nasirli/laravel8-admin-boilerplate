<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position');
            $table->boolean('status')->default(true);
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_categories');
    }
}
