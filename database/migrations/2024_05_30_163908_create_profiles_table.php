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
        Schema::create("profiles", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("image_id")->nullable();
            $table->unsignedBigInteger("cover_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("image_id")->references("id")->on("media"); // media
            $table->foreign("cover_id")->references("id")->on("media"); // media
            $table->string("name", 80);
            $table->string("username", 80);
            $table->string("bio", 240);
            $table->json("externals")->nullable(); // external links
            $table->unsignedMediumInteger("rating")->default(0); // sum of votes for post + votes for comments
            $table->timestamp("active_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("profiles");
    }
};
