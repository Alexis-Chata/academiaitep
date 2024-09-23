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
        Schema::create("ccobros", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->double("ccobroable_id");
            $table->string("ccobroable_type", 45);
            $table->double("moto");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("ccobros");
    }
};
