<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->string('full_name');
            $table->string('nickname')->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->text('address');
            $table->string('phone')->nullable();
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('previous_school')->nullable();
            $table->string('program')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['baru', 'diproses', 'diterima', 'ditolak'])->default('baru');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_registrations');
    }
};
