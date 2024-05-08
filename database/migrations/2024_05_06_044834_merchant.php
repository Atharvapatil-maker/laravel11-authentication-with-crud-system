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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('merchant_txn_id');
            $table->date('date');
            $table->string('payment_method');
            $table->decimal('amount', 10, 2);
            $table->string('order_id');
            $table->string('bank_ref_no');
            $table->string('status');
            $table->json('member_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
