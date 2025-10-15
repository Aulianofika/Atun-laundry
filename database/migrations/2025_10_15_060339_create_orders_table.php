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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('order_date')->default(now());
            $table->enum('delivery_type', ['antar_sendiri', 'jemput_antar']);
            $table->enum('status', ['pending', 'process', 'done', 'taken'])->default('pending');
            $table->integer('total')->default(0);
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
