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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date')->index();
            $table->date('last_change_date')->nullable();
            $table->string('supplier_article', 20)->nullable();
            $table->string('tech_size', 20)->nullable();
            $table->Integer('barcode');
            $table->unsignedInteger('quantity');
            $table->boolean('is_supply')->nullable();
            $table->boolean('is_realization')->nullable();
            $table->unsignedInteger('quantity_full')->nullable();
            $table->string('warehouse_name', 120);
            $table->boolean('in_way_to_client')->nullable();
            $table->boolean('in_way_from_client')->nullable();
            $table->integer('nm_id');
            $table->string('subject', 20)->nullable();
            $table->string('category', 20)->nullable();
            $table->string('brand', 20)->nullable();
            $table->unsignedInteger('sc_code')->nullable();
            $table->string('price', 40)->nullable();
            $table->string('discount', 40)->nullable();
            $table->string('hash_sha1', 40)
                ->virtualAs('sha1(CONCAT_WS(date, last_change_date, supplier_article,
                    tech_size, barcode, quantity, is_supply, is_realization, quantity_full,
	                warehouse_name, in_way_to_client, in_way_from_client, nm_id, subject,
                    category, brand, sc_code, price, discount))')
                ->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
