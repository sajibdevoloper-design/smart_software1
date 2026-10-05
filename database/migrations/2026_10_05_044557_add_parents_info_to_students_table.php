<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('mother_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mobile_number')->nullable();   
        });
DB::statement("
    ALTER TABLE students
    ADD CONSTRAINT father_or_mother_required
    CHECK (
        father_name IS NOT NULL
        OR mother_name IS NOT NULL
    )
");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
