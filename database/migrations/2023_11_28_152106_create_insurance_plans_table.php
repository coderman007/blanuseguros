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
        Schema::create('insurance_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('line_id'); // Clave foránea para la relación con los ramos
            $table->string('title');
            $table->text('description');
            $table->text('coverage');
            $table->text('effective_period')->nullable();  // vigencia del plan
            $table->decimal('price', 10, 2);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('line_id')->references('id')->on('lines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_plans');
    }
};
