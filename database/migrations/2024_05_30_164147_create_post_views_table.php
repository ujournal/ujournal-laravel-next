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
        Schema::create("post_views", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("post_id")->nullable();
            $table->unsignedBigInteger("country_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreign("country_id")->references("id")->on("countries");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("post_views");
    }
};
