<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn([
                'bank_account',
                'bank_name',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
        });
    }
};