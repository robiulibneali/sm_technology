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
        Schema::create('home_page_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('note')->nullable();
            $table->text('slider_image')->nullable();
            $table->text('service_link')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_sliders');
    }
};
