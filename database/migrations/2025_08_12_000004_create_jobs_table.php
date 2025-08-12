<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('customer_id')->constrained('users')->cascadeOnDelete();
            $table->string('product_type');
            $table->string('vehicle_requirement')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->float('breadth')->nullable();
            $table->string('image')->nullable();
            $table->string('vehicle_type');
            $table->integer('number_of_vehicles');
            $table->date('pickup_date');
            $table->string('pickup_point');
            $table->string('destination_point');
            $table->decimal('price', 12, 2)->nullable();
            $table->string('insurance_package')->nullable();
            $table->enum('status', [
                'pending', 'accepted', 'declined',
                'driver_inbound', 'driver_loading', 'in_transit', 'delivered'
            ])->default('pending');
            $table->text('decline_reason')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('job_offers');
    }
};
