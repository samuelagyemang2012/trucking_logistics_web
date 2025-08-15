<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            // $table->string('name')->unique();
            // $table->string('email')->unique();
            $table->string('tin_number')->unique();
            // $table->string('telephone')->unique();
            // $table->mediumText('address');
            $table->string('company_certificate')->nullable();
            $table->string('insurance_provider')->nullable();
            $table->integer('status')->default(12);
            // $table->integer('number_of_vehicles')->default(0); Companies can do that when managing their fleet
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }
    public function down(): void {
        Schema::dropIfExists('companies');
    }
};
