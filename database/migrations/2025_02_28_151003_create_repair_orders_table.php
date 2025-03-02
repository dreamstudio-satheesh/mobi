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
        Schema::create('repair_orders', function (Blueprint $table) {
            $table->id();
            $table->string('repair_id')->unique(); // Unique Repair Order ID
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('device_brand');
            $table->string('device_model');
            $table->string('serial_number')->nullable();
            $table->text('issue_description');
            $table->decimal('estimated_cost', 10, 2)->nullable();
            $table->date('expected_completion_date')->nullable();
            $table->enum('priority', ['Low', 'Medium', 'High'])->default('Medium');
            $table->enum('status', ['Pending', 'In Progress', 'Completed', 'Delivered', 'Cancelled'])->default('Pending');
            $table->enum('repair_progress', ['Diagnosis Completed', 'Waiting for Parts', 'Repair Ongoing', 'Quality Check', 'Completed'])->nullable();
            $table->foreignId('technician_id')->nullable()->constrained('users')->onDelete('set null');
            $table->text('progress_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_orders');
    }
};
