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
        Schema::create("poll_questions", function (Blueprint $table) {
            $table->id();
            $table->foreign("poll_id")->references("id")->on("polls");
            $table->string("name", 240);
            $table->unsignedMediumInteger("votes")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("poll_questions");
    }
};
