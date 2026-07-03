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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('g_number', 25);
            $table->date('date')->index();
            $table->date('last_change_date');
            $table->string('supplier_article', 20);
            $table->string('tech_size', 20);
            $table->Integer('barcode');
            $table->float('total_price', precision: 2);
            $table->unsignedTinyInteger('discount_percent');
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            $table->string('promo_code_discount', 25)->nullable();
            $table->string('warehouse_name', 40);
            $table->string('country_name', 40);
            $table->string('oblast_okrug_name', 40);
            $table->string('region_name', 40);
            $table->unsignedInteger('income_id');
            $table->string('sale_id', 15);
            $table->unsignedInteger('odid')->nullable();
            $table->string('spp', 4);
            $table->float('for_pay', precision: 2);
            $table->float('finished_price', precision: 2);
            $table->float('price_with_disc', precision: 2);
            $table->integer('nm_id');
            $table->string('subject', 20);
            $table->string('category', 20);
            $table->string('brand', 20);
            $table->boolean('is_storno')->nullable();
            $table->unique(['g_number', 'sale_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
