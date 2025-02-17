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
        Schema::create('blog_post', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->text('content');
            $table->timestamp('published_at')->nullable();

            $table->unsignedBigInteger('user_id')->nullable(); // Define user_id as a foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Explicit foreign key

            $table->enum('category', ['Berita Umum', 'Tak Berkategori']);
            $table->string('thumbnail')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_post');
    }
};
