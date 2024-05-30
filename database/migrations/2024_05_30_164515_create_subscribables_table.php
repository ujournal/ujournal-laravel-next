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
        Schema::create("subscribables", function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("subscribable_type", 400);
            $table->unsignedBigInteger("subscribable_id"); // user, tag
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("subscribables");
    }
};
