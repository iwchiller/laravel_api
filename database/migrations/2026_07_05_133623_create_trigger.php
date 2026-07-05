<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
        CREATE TRIGGER stocks_before_insert BEFORE INSERT ON stocks FOR EACH ROW
                BEGIN
                    SET NEW.hash_sha1 = sha1(CONCAT_WS(NEW.date,
                    NEW.last_change_date,
                    NEW.supplier_article,
                    NEW.tech_size,
	                NEW.barcode,
	                NEW.quantity,
	                NEW.is_supply,
	                NEW.is_realization,
	                NEW.quantity_full,
	                NEW.warehouse_name,
	                NEW.in_way_to_client,
	                NEW.in_way_from_client,
                    NEW.nm_id,
                    NEW.subject,
                    NEW.category,
                    NEW.brand,
                    NEW.sc_code,
                    NEW.price,
                    NEW.discount));
                END"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER stocks_before_insert");

    }
};
