<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
    Schema::table('users', function (Blueprint $table) {
        // Voeg alleen toe wat nog niet bestaat
        // Username is al toegevoegd in een andere migratie
        $table->boolean('is_admin')->default(false)->after('email');
    });
}





public function down(){
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('is_admin');
    });
}

};
