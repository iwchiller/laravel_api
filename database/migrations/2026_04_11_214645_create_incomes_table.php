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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('income_id');
            $table->string('number', 20);
            $table->date('date')->index();
            $table->date('last_change_date');
            $table->string('supplier_article', 20);
            $table->string('tech_size', 20);
            $table->Integer('barcode');
            $table->unsignedInteger('quantity');
            $table->string('total_price', 40);
            $table->date('date_close');
            $table->string('warehouse_name', 40);
            $table->integer('nm_id');
            $table->unique(['income_id', 'supplier_article']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
