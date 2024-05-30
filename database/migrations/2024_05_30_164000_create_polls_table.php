<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("polls", function (Blueprint $table) {
            $table->id();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("title", 500);
            $table->unsignedMediumInteger("votes")->default(0); // sum of poll questions votes
            $table->timestamp("finish_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("polls");
    }
};
