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
    Schema::create('dependents', function (Blueprint $table) {
        $table->id('dependent_id');
        $table->unsignedBigInteger('member_id');
        $table->string('full_name');
        $table->string('ic_number');
        $table->date('date_of_birth');
        $table->integer('age')->nullable();
        $table->enum('relationship', ['Anak', 'Isteri', 'Suami']);
        $table->enum('status', ['Active', 'Inactive', 'Expired'])->default('Active');
        $table->boolean('is_student')->default(false);
        $table->string('student_proof_path')->nullable();
        $table->timestamps();
        
        $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};
