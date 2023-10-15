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
        Schema::create('HistoryBooking', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idUser');
            $table->string('nameUser');
            $table->bigInteger('idRoom');
            $table->string('phone');
            $table->string('emailUser');
            $table->dateTime('checkIn');
            $table->dateTime('checkOut');
            $table->integer('status')->default(0)->comment('0: pending ,1: cancel, 2: success');
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HistoryBooking');
    }
};
