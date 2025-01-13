<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('month_closures', function (Blueprint $table) {
            $table->id();
            $table->date('start_date'); // Start of the custom month
            $table->date('end_date');   // End of the custom month
            $table->boolean('is_closed')->default(false); // Whether this period is closed
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('month_closures');
    }
};
