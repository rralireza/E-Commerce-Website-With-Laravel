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
        Schema::create('category_property_group', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
            $table->foreignId('property_group_id')->constrained();

            $table->primary(['category_id', 'property_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_property_group');
    }
};
