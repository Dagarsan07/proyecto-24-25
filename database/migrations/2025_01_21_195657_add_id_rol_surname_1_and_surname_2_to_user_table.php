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
            $table->string('first_name', 30);
            $table->string('surname_1', 30);
            $table->string('surname_2', 30)->nullable();
            $table->foreignId('id_rol')
                ->constrained('roles', 'id', 'users_rol_id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_rol']);
            $table->dropColumn('first_name');
            $table->dropColumn('surname_1');
            $table->dropColumn('surname_2');
            $table->dropColumn('id_rol');
        });
    }
};
