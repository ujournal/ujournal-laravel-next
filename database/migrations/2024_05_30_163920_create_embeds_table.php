<?php

use App\Enums\EmbedType;
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
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("media_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("media_id")->references("id")->on("media"); // image
            $table->string("type", 20)->default(EmbedType::WEBPAGE->value);
            $table->string("url")->nullable();
            $table->string("name", 120)->nullable();
            $table->string("description", 240)->nullable();
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
