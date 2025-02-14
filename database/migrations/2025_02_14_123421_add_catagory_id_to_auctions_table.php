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
        Schema::table('auctions', function (Blueprint $table) {
            $table->unsignedBigInteger('catagory_id');
        });
    }
    
    public function down()
    {
        Schema::table('auctions', function (Blueprint $table) {
            $table->dropColumn('catagory_id');
        });
    }
    
};
