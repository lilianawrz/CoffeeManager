<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('moment');
            $table->string('status');
            $table->foreignId('client_id')->nullable()
                ->constrained('clients')->default(null);

            $table->foreignId('payment_id')->nullable()
                ->constrained('payments')->default(null);
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};