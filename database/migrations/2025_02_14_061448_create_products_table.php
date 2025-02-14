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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to categories table
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            
            // Optional: if a product is linked to a single supplier
            $table->foreignId('supplier_id')->nullable()->constrained()->onDelete('set null');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('sku')->unique();
            
            // For mobile phones: new, refurbished, second-hand
            $table->enum('condition', ['new', 'refurbished', 'second-hand'])->nullable();

            $table->integer('stock')->default(0);
            
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('selling_price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->string('currency', 10)->default('USD');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
