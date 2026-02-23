<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'is_new')) {
                $table->boolean('is_new')->default(true);
            }
            if (!Schema::hasColumn('services', 'room_count')) {
                $table->integer('room_count')->default(1);
            }
            if (!Schema::hasColumn('services', 'adult_count')) {
                $table->integer('adult_count')->default(1);
            }
            if (!Schema::hasColumn('services', 'children_count')) {
                $table->integer('children_count')->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('is_new');
            $table->dropColumn('room_count');
            $table->dropColumn('adult_count');
            $table->dropColumn('children_count');
        });
    }
};
