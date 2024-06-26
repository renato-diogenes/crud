<?php

use App\Enums\FruitCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fruits', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 30);
            $table->enum('classification', FruitCategory::toArray());
            $table->boolean('fresh');
            $table->unsignedSmallInteger('quantity');
            $table->decimal('price', 6, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fruits');
    }
};
