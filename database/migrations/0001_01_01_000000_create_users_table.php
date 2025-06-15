<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nombre del usuario
            $table->string('email')->unique(); // correo electrónico
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // contraseña
            $table->enum('tipo_usuario', ['admin', 'user'])->default('user'); // nuevo campo tipo_usuario
            $table->rememberToken();
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
