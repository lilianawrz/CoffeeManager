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
        Schema::disableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('description', 350);

            $table->decimal('price', 14, 2); // Corrigido o tipo de dados para decimal
            $table->integer('quantity')->default(0);
            $table->decimal('limitWeight')->default(0);
            $table->date('validity')->nullable();
            $table->string('image', 150)->nullable();
            $table->foreignId('category_id')->nullable()
                ->constrained('categories')->default(null);
            $table->foreignId('company_id')->nullable()
                ->constrained('companies')->default(null);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
