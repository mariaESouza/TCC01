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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('code');
            $table->integer('reference');
            $table->char('description');
            $table->integer('value'); 	
            $table->char('patch');
            $table->foreignId('collection_id');
            $table->foreignId('type_id');
    
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};