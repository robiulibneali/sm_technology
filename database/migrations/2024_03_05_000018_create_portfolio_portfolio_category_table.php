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
        Schema::create('portfolio_portfolio_category', function (
            Blueprint $table
        ) {
            $table->unsignedBigInteger('portfolio_category_id');
            $table->unsignedBigInteger('portfolio_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_portfolio_category');
    }
};
