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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phoneno');
            $table->string('seat');
            $table->string('gender'); 
            $table->integer('bus_id'); 
            $table->string('selectedSeats');
            $table->string('status')->default('Unpaid');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('reserves', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
    
};
