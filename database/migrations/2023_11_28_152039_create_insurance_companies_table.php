<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('insurance_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre de la compañía de seguros
            $table->string('url')->nullable(); // URL de la compañía (puede ser nulo)
            $table->string('address')->nullable(); // Dirección de la compañía (puede ser nulo)
            $table->string('phone')->nullable(); // Número de teléfono de la compañía (puede ser nulo)
            $table->string('email')->unique(); // Dirección de correo electrónico de la compañía (puede ser nulo)
            $table->boolean('is_active')->default(true);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_companies');
    }
};
