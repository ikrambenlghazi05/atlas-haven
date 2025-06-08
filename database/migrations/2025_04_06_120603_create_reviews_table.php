<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('reservation_id')->nullable()->constrained()->onDelete('set null');
            $table->tinyInteger('rating')->unsigned()->between(1, 5);
            $table->softDeletes();  // Adds deleted_at column
            $table->text('comment');
            $table->timestamps();

            // Ensure a user can only review a room once
            $table->unique(['user_id', 'room_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
