
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->enum('claim_type', [
                'Member',
                'Dependant'
            ])->nullable();

            $table->string('death_certificate_no')->nullable();

            $table->string('member_ic_document')->nullable();
            $table->string('death_certificate_document')->nullable();
            $table->string('burial_permit_document')->nullable();
            $table->string('marriage_certificate_document')->nullable();
            $table->string('birth_certificate_document')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn([
                'claim_type',
                'death_certificate_no',
                'member_ic_document',
                'death_certificate_document',
                'burial_permit_document',
                'marriage_certificate_document',
                'birth_certificate_document'
            ]);
        });
    }
};
