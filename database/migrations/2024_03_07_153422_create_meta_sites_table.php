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
        Schema::create('meta_site', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title', 65)->default("");
            $table->string('meta_description', 320)->default("");
            $table->string('meta_keyword', 255)->default("");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_site');
    }
};
