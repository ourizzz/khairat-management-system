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
    Schema::create('members', function (Blueprint $table) {
        $table->id('member_id');
        $table->unsignedBigInteger('user_id');
        $table->string('full_name');
        $table->string('ic_number');
        $table->string('phone');
        $table->text('address');
        $table->string('occupation')->nullable();
        $table->date('registration_date');
        $table->enum('membership_status', ['Active', 'Inactive'])->default('Active');
        $table->decimal('membership_fee', 10, 2)->default(60.00);
        $table->string('payment_method')->nullable();
        $table->string('receipt_no')->nullable();
        $table->string('admin_verified_by')->nullable();
        $table->string('admin_signature')->nullable();
        $table->timestamps();
        
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
