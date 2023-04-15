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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('vendor_id');
            $table->integer('category_id');
            $table->integer('product_id');
            $table->integer('warehouse_id');
            $table->string('purchase_no');
            $table->date('date');
            $table->string('description')->nullable();
            $table->double('price');
            $table->double('qty');
            $table->double('sub_total');
            $table->double('total_amount');
            $table->double('discount');
            $table->tinyInteger('status')->default('0');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
