
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {

            // Applicant details
            $table->date('birth_date')->nullable();
            $table->string('email')->nullable();

            // Heir details
            $table->string('heir_name')->nullable();
            $table->string('heir_phone', 20)->nullable();

            // Registration payment
            $table->string('payment_receipt_path')->nullable();

            // Original registration record
            $table->json('registration_snapshot')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {

            $table->dropColumn([
                'birth_date',
                'email',
                'heir_name',
                'heir_phone',
                'payment_receipt_path',
                'registration_snapshot'
            ]);

        });
    }
};