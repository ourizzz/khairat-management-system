<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('bank_name')->nullable();

            $table->enum('payment_status', [
                'Pending',
                'Successful',
                'Failed'
            ])->default('Pending');

            $table->string('transaction_reference')
                ->nullable()
                ->unique();
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropUnique([
                'transaction_reference'
            ]);

            $table->dropColumn([
                'bank_name',
                'payment_status',
                'transaction_reference'
            ]);
        });
    }
};