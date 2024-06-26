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
        Schema::create("media", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("type", 20);
            $table->string("url", 500);
            $table->unsignedMediumInteger("width")->nullable();
            $table->unsignedMediumInteger("height")->nullable();
            $table->unsignedMediumInteger("duration")->nullable(); // in seconds
            $table->unsignedMediumInteger("size")->default(0); // in kbytes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("media");
    }
};
