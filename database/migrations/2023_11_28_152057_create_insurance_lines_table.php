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
        Schema::create('insurance_lines', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('insurance_company_id');

            $table->string('name'); // Nombre de la línea de negocio (por ejemplo, vida, automóvil, hogar)
            $table->text('description')->nullable(); // Descripción de la línea de negocio (puede ser nulo)
            $table->boolean('is_active')->default(true);
            $table->string('image')->nullable();
            $table->timestamps();


            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_lines');
    }
};
