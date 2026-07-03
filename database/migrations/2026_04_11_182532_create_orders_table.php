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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('g_number', 25)->unique();
            $table->date('date')->index();
            $table->date('last_change_date');
            $table->string('supplier_article', 20);
            $table->string('tech_size', 20);
            $table->Integer('barcode');
            $table->float('total_price', precision: 2);
            $table->unsignedTinyInteger('discount_percent');
            $table->string('warehouse_name', 40);
            $table->string('oblast', 50);
            $table->unsignedInteger('income_id');
            $table->unsignedInteger('odid')->nullable();
            $table->integer('nm_id');
            $table->string('subject', 20);
            $table->string('category', 20);
            $table->string('brand', 20);
            $table->boolean('is_cancel');
            $table->date('cancel_dt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
