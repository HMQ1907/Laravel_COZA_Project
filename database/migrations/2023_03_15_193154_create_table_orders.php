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
        Schema::create('Orders', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('phone_number',50);
            $table->string('address',100);
            $table->string('city',50);
            $table->longText('note');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_id');
            $table->float('order_total');
            $table->string('order_status');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Orders', function (Blueprint $table) {
            //
            Schema::dropIfExists('Orders');
        });
    }
};