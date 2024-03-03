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
        Schema::create('photo_likes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('photo_id')->constrained('photos', 'id', 'photo_likes_photo_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users', 'id', 'photo_likes_user_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('liked_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_likes');
    }
};
