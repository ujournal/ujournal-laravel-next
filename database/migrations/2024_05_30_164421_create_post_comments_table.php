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
        Schema::create("post_comments", function (Blueprint $table) {
            $table->id();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("post_id")->references("id")->on("posts");
            $table
                ->foreign("post_comment_id")
                ->references("id")
                ->on("post_comments");
            $table->unsignedBigInteger("embed_id")->nullable();
            $table->foreign("embed_id")->references("id")->on("embeds");
            $table->json("content");
            $table->string("description", 240);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("post_comments");
    }
};
