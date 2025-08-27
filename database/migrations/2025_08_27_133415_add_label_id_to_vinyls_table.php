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
        Schema::table('vinyls', function (Blueprint $table) {
            // add label_id column
            $table->foreignId("label_id")
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vinyls', function (Blueprint $table) {
            // remove constrain and drop label_id
            $table->dropForeign("vinyls_label_id_foreign");
            $table->dropColumn("label_id");
        });
    }
};
