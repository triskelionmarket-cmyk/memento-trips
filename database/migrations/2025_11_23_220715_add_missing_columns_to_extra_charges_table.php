<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('extra_charges', function (Blueprint $table) {
            if (!Schema::hasColumn('extra_charges', 'apply_to_all_persons')) {
                $table->boolean('apply_to_all_persons')->default(false)->after('is_mandatory');
            }
            if (!Schema::hasColumn('extra_charges', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('extra_charges', function (Blueprint $table) {
            if (Schema::hasColumn('extra_charges', 'apply_to_all_persons')) {
                $table->dropColumn('apply_to_all_persons');
            }
            if (Schema::hasColumn('extra_charges', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
        });
    }
};
