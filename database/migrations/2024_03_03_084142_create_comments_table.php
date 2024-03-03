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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('photo_id')->constrained('photos', 'id', 'comments_photo_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users', 'id', 'comments_user_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('comment');
            $table->date('commented_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
