<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('our_services', function (Blueprint $table) {
            $table
                ->foreign('our_service_category_id')
                ->references('id')
                ->on('our_service_categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_services', function (Blueprint $table) {
            $table->dropForeign(['our_service_category_id']);
        });
    }
};
