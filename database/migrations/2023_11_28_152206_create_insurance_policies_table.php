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
        Schema::create('insurance_policies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('insurance_company_id'); // Clave foránea para la relación con las aseguradoras
            $table->unsignedBigInteger('insurance_line_id'); // Clave foránea para la relación con los ramos
            $table->unsignedBigInteger('policy_holder_id'); // Clave foránea para la relación con los tomadores


            $table->string('policy_number');
            $table->string('vehicle_plate')->nullable();
            $table->string('contract_number')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('net_premium', 10, 2)->nullable();
            $table->decimal('expenditures', 10, 2)->nullable();
            $table->decimal('value_added_tax', 10, 2)->nullable();
            $table->decimal('total_value', 10, 2);
            $table->enum('payment_method', ['Credit Card', 'Debit Card', 'Bank Transfer', 'Cash', 'Other'])->nullable();
            $table->date('payment_date')->nullable();
            $table->timestamps();

            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->foreign('insurance_line_id')->references('id')->on('insurance_lines')->onDelete('cascade');
            $table->foreign('policy_holder_id')->references('id')->on('policy_holders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_policies');
    }
};
