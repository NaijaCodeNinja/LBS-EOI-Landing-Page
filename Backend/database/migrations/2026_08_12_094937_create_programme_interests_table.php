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
        Schema::create('programme_interests', function (Blueprint $table) {
            $table->id(); // This creates your primary key. It's a special, auto-incrementing integer.
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('programme'); // e.g., "Full-Time MBA", "Executive Education"
            $table->text('interest_reason')->nullable(); // Optional field for notes
            $table->timestamps(); // Creates created_at and updated_at columns automatically
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programme_interests');
    }
};
