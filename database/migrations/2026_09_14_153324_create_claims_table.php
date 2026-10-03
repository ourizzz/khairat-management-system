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
    Schema::create('claims', function (Blueprint $table) {
        $table->id('claim_id');
        $table->unsignedBigInteger('member_id');
        $table->date('claim_date');
        $table->string('deceased_name');
        $table->string('deceased_ic');
        $table->date('date_of_death');
        $table->string('place_of_death');
        $table->string('cause_of_death');
        $table->string('relationship');
        $table->enum('status', ['Pending', 'Approved', 'Rejected', 'Completed'])->default('Pending');
        $table->decimal('claim_amount', 10, 2)->nullable();
        $table->string('bank_account')->nullable();
        $table->string('bank_name')->nullable();
        $table->string('admin_verified_by')->nullable();
        $table->date('verification_date')->nullable();
        $table->timestamps();
        
        $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
