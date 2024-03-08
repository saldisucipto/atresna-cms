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
        Schema::table('blog_news', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_meta_site')->after("title");

            $table->foreign('id_meta_site')->references('id')->on('meta_site')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_news', function (Blueprint $table) {
            //
            $table->dropColumn('id_meta_site');
        });
    }
};
