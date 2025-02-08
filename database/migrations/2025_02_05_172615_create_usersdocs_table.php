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
        Schema::create('usersdocs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('doc_type')->default("id");
            $table->string('doc_path');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('verified_reason')->nullable();
            $table->string('rejected_by')->nullable();
            $table->string('rejected_reason')->nullable();
            $table->timestamp('rejected_at')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersdocs');
    }
};
