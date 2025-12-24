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
        Schema::table('users', function (Blueprint $table) {
            // Idinagdag ang 'role' column pagkatapos ng 'email'
            // Nilagyan din natin ng default value na 'student' para hindi mag-error sa luma
            $table->string('role')->default('student')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tatanggalin ang column kapag ni-rollback ang migration
            $table->dropColumn('role');
        });
    }
};