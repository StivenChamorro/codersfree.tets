<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

             //llaves foraneas
             $table->unsignedBigInteger('post_id')->nullable();
             $table->unsignedBigInteger('tag_id')->nullable();
             //referenciando la tabla users
             $table->foreign('post_id')->references('id')->on('posts')->onDelete('set null');
             //referenciando la tabla categorias    
             $table->foreign('tag_id')->references('id')->on('tags')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
