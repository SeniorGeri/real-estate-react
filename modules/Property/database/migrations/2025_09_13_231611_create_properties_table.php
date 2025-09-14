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
        Schema::create('properties', function (Blueprint $table) {

            $table->id();

            $table->foreignId('property_type_id')->nullable()->constrained('property_types')->nullOnDelete();
            $table->foreignId('property_status_id')->nullable()->constrained('property_statuses')->nullOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained('zones')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('currency_id')->nullable()->constrained('currencies')->nullOnDelete();

            $table->string('title');
            $table->string('slug');

            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('address')->nullable();


            $table->boolean('for_sale')->default(false);
            $table->integer('price')->default(0);
            $table->integer('price_per_month')->default(0);
            $table->boolean('for_rent')->default(false);

            $table->integer('views')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);

            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('floor')->default(0);
            $table->integer('garages')->default(0);
            $table->integer('area')->default(0);
            $table->integer('total_area')->default(0);
            $table->integer('net_area')->default(0);

            $table->boolean('elevator')->default(false);

            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->string('hover_image')->nullable();
            $table->json('gallery')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
