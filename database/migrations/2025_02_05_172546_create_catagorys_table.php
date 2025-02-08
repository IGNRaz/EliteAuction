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
        Schema::create('catagorys', function (Blueprint $table) {
            $table->id();
            $table->string("catagory_name");
            $table->string("catagory_description");
            $table->foreignId('parent_id')->nullable()->constrained('catagorys');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catagorys');
    }
};
