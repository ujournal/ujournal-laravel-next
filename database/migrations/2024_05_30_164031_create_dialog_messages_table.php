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
        Schema::create("dialog_messages", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("dialog_id")->nullable();
            $table->unsignedBigInteger("partner_id")->nullable();
            $table->unsignedBigInteger("media_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("dialog_id")->references("id")->on("dialogs");
            $table->foreign("partner_id")->references("id")->on("users");
            $table->foreign("media_id")->references("id")->on("media"); // image
            $table->json("content")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("dialog_messages");
    }
};
