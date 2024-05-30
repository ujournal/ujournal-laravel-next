<?php

use App\Enums\PostStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("posts", function (Blueprint $table) {
            $table->id();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("status", 10)->default(PostStatus::DRAFT->value);
            $table->string("title", 120);
            $table->string("description", 240);
            $table->json("content")->nullable();
            $table->mediumInteger("votes")->default(0); // upvotes + downvotes
            $table->unsignedMediumInteger("upvotes")->default(0); // sum of positive votes
            $table->unsignedMediumInteger("downvotes")->default(0); // sum of negative votes
            $table->float("rating")->default(0); // calc on upvotes / downvotes + created_at
            $table->unsignedMediumInteger("views")->default(0); // count of post_views
            $table->timestamp("publish_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("posts");
    }
};
