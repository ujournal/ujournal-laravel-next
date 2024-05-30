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
        Schema::create("votables", function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("votable_type", 400);
            $table->unsignedBigInteger("votable_id"); // post, comment, poll_question
            $table->tinyInteger("value");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("votables");
    }
};