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
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("ap_paterno");
            $table->string("ap_materno");
            $table->string("f_tipo_documento_id");
            $table->string("nro_documento");
            $table->string("direccion")->nullable();
            $table->string("celular1")->nullable();
            $table->string("celular2")->nullable();
            $table->char("id_moodle_user")->nullable();
            $table->char("estado", 1);
            $table->char("locked", 1);
            $table->string("email")->unique();
            $table->string("deuda_pendiente");
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->rememberToken();
            $table->foreignId("current_team_id")->nullable();
            $table->string("profile_photo_path", 2048)->nullable();
            $table->string("dni_path", 2048)->nullable();
            $table->timestamps();

            if(env('DB_CONNECTION')!="sqlite"){
                $table->fullText(["name", "ap_paterno", "ap_materno", "nro_documento"]);
            }
        });

        Schema::create("password_reset_tokens", function (Blueprint $table) {
            $table->string("email")->primary();
            $table->string("token");
            $table->timestamp("created_at")->nullable();
        });

        Schema::create("sessions", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->foreignId("user_id")->nullable()->index();
            $table->string("ip_address", 45)->nullable();
            $table->text("user_agent")->nullable();
            $table->longText("payload");
            $table->integer("last_activity")->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("users");
        Schema::dropIfExists("password_reset_tokens");
        Schema::dropIfExists("sessions");
    }
};
