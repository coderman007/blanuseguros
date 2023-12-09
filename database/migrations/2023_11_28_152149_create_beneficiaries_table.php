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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('policy_holder_id'); // Clave foránea para la relación con los tomadores
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('relationship');
            $table->timestamps();

            $table->foreign('policy_holder_id')->references('id')->on('policy_holders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
