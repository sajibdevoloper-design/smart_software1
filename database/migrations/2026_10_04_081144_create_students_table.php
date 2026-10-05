```php
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
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            // Student Information
            $table->string('student_name');
            $table->string('student_id')->unique();

            // Contact Information
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Personal Information
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();

            // Academic Information
            $table->string('department');
            $table->date('admission_date')->nullable();

            // Student Image
            $table->string('student_image')->nullable();

            // Student Status
            $table->string('status')->default('Active');

            // Address Information
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            // Created At & Updated At
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};