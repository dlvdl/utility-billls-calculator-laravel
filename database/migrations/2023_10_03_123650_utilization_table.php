<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('tariff_id')->constrained('tariffs', 'id');
            $table->decimal('utilized', 10, 2);
            $table->decimal('cost', 10, 2);
            $table->date('utilization_time');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('utilization');
    }
};