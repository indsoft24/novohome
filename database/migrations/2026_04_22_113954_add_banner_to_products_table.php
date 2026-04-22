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
        Schema::table('products', function (Blueprint $table) {

            if (!Schema::hasColumn('products', 'banner')) {
                $table->string('banner')->nullable();
            }

            if (!Schema::hasColumn('products', 'title')) {
                $table->string('title')->nullable();
            }

            if (!Schema::hasColumn('products', 'subtitle')) {
                $table->string('subtitle')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['banner', 'title', 'subtitle']);
        });
    }
};