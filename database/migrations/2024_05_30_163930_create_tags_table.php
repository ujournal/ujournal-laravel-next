<?php

use App\Enums\TagType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("tags", function (Blueprint $table) {
            $table->id();
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger("media_id")->nullable();
            $table->foreign("media_id")->references("id")->on("media"); // image
            $table->string("type", 10)->default(TagType::USER->value);
            $table->string("name", 80);
            $table->string("alias", 80);
            $table->string("description", 240)->nullable(); // nullable
            $table->boolean("protect")->default(false); // can be viewed only by moderator or admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("tags");
    }
};
