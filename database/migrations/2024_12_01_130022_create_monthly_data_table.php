<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('monthly_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->decimal('salary', 10, 2);
            $table->decimal('food_expenses', 10, 2);
            $table->decimal('home_rent', 10, 2);
            $table->decimal('transportation', 10, 2);
            $table->decimal('medicine', 10, 2);
            $table->decimal('total_expenses', 10, 2);
            $table->decimal('remaining_balance', 10, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('monthly_data');
    }
};
