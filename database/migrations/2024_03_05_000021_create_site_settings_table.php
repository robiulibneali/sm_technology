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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('site_name')->nullable();
            $table->text('favicon')->nullable();
            $table->text('logo')->nullable();
            $table->text('site_banner')->nullable();
            $table->longText('common_meta')->nullable();
            $table->longText('common_seo_header')->nullable();
            $table->longText('common_seo_footer')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->longText('google_map_embade_location_link')->nullable();
            $table->text('fb_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->text('x_link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
