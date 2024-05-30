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
        Schema::create("post_embedables", function (Blueprint $table) {
            $table->foreign("post_id")->references("id")->on("posts");
            $table->string("embedable_type", 400);
            $table->unsignedBigInteger("embedable_id"); // embed, poll
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("post_embedables");
    }
};
