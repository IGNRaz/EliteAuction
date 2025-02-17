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
        Schema::create('banneds', function (Blueprint $table) {
            $table->id();
            $table->string('banned_email');
            $table->foreign('banned_email')->references('email')->on('users')->onDelete('cascade');
            $table->boolean('banned')->default(false);
            $table->string('reason');
            $table->string('expires_at')->nullable();
            $table->foreignId('banned_by')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banneds');
    }
};
