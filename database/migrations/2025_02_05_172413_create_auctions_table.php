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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->timestamp('end_date');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_sold')->default(false);
            $table->foreignId('sold_to')->nullable()->constrained('users');
            $table->timestamp('sold_at')->nullable();
            
            $table->integer("entery_fee");
            $table->integer("minumum_bid");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
