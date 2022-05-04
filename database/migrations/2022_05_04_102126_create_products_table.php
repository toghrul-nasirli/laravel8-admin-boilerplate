<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position');
            $table->boolean('status')->default(true);
            $table->string('slug')->unique();
            $table->foreignId('parent_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('name')->unique();
            $table->text('text');
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
