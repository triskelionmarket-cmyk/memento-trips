<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('availabilities', function (Blueprint $table) {
            if (!Schema::hasColumn('availabilities', 'age_categories')) {
                $table->json('age_categories')->nullable()->after('per_children_price');
            }
        });
    }

    public function down(): void
    {
        Schema::table('availabilities', function (Blueprint $table) {
            $table->dropColumn('age_categories');
        });
    }
};
