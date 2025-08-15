<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('company_id')->constrained()->cascadeOnDelete();
            $table->integer('type');
            $table->string('model');
            $table->string('registration_number')->unique();
            $table->string('number_plate')->unique();
            $table->float('mileage', precision:53)->nullable();
            $table->float('payload', precision:53)->nullable();
            $table->float('manufacture_year',precision:53)->nullable();
            $table->integer('status_id')->default(8);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('vehicles');
    }
};
