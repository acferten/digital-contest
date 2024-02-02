<?php

use Domain\Products\Enums\OrderStatus;
use Domain\Products\Enums\ProductEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('product_id');
            $table->bigInteger('user_id');
            $table->bigInteger('invoice_id')->unique();
            $table->bigInteger('work_id');
            $table->enum('status', OrderStatus::values())->default(OrderStatus::Pending->value);

            $table->foreign('work_id')->references('id')->on('works');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
