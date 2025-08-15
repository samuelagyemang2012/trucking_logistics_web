<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('customer_id')->constrained('users')->cascadeOnDelete();
            $table->integer('product_type_id');
            // $table->string('vehicle_type')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->float('breadth')->nullable();
            $table->string('image')->nullable();
            $table->string('vehicle_type_id');
            $table->integer('number_of_vehicles');
            $table->date('pickup_date');
            $table->string('pickup_point'); //later add longitude and latitude for map services
            $table->string('destination_point'); //later add longitude and latitude for map services
            $table->decimal('price', 12, 2)->nullable(); //later be calculated by distance automatically
            $table->string('insurance_package')->nullable();
            $table->integer('status_id')->default(1);
            $table->text('decline_reason')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('job_offers');
    }
};
