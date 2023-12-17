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
        Schema::create('transation_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('slot_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('slot_number');
            $table->string('payment_type');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->default('BDT');
            $table->float('amount',8,2);
            $table->string('order_number')->nullable();
            $table->string('invoice_number');
            $table->string('order_date');
            $table->enum('status',['pending','confirmed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transation_infos');
    }
};
