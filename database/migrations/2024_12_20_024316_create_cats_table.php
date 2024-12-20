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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();                              
            $table->string('name');// Cat's name
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            $table->integer('age')->nullable();       // Cat's age (in years)
            $table->string('breed')->nullable();      // Cat's breed
            $table->enum('gender', ['male', 'female'])->nullable(); // Cat's gender
            $table->boolean('is_adopted')->default(false);
            $table->text('description')->nullable();  // Short description or bio
            $table->string('temperament')->nullable();// Cat's temperament (e.g., playful, calm)
            $table->boolean('available')->default(true); // Availability for rental
            $table->decimal('adoption_fee', 8, 2)->nullable(); // Price for renting (e.g., per day)
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
