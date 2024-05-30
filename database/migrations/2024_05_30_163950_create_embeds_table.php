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
        Schema::create("embeds", function (Blueprint $table) {
            $table->id();
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger("media_id")->nullable();
            $table->foreign("media_id")->references("id")->on("media"); // image
            $table->string("type", 10);
            $table->string("url")->nullable();
            $table->string("name", 240)->nullable();
            $table->string("description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("embeds");
    }
};
