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
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_no');
            $table->string('item_name');
            $table->string('inventory_location');
            $table->string('brand');
            $table->string('category');
            $table->unsignedBigInteger('supplier_id');
            $table->string('stock_unit');
            $table->decimal('unit_price', 10, 2);
            $table->json('item_images')->nullable();
            $table->boolean('status')->default(1); // Enable-1 Disable-0
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
