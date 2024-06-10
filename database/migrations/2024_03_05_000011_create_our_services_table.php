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
        Schema::create('our_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('our_service_category_id');
            $table->string('title');
            $table->string('icon_class')->nullable();
            $table->string('image')->nullable();
            $table->text('thamb_image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table
                ->integer('view_count')
                ->default(0)
                ->nullable();
            $table
                ->tinyInteger('status')
                ->default(1)
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_services');
    }
};
