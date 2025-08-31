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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id') // foreign key
                ->constrained('countries') // table reference
                ->onDelete('cascade');
            $table->string('name', 30); // spanish common name ex "Montevideo"
            $table->string('code', 3); // ISO code ex "MO"
            $table->unique(['country_id', 'code']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
