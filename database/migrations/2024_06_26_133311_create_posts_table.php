<?php

use App\Models\Post;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name',45);
            $table->string('slug',45);
            $table->string('extract',45);
            $table->string('body',45);

            $table->enum('status',[Post::BORRADOR, Post::PUBLICADO])->default(Post::BORRADOR)->nullable();

            //llaves foraneas
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            //referenciando la tabla users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            //referenciando la tabla categorias    
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
