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
            $table->string('login')->nullable()->after('name');
            $table->string('first_name')->nullable()->after('login');
            $table->string('last_name')->nullable()->after('first_name');
            $table->biginteger('mobile')->nullable()->after('last_name');
            $table->string('profile')->nullable()->after('mobile');
            $table->string('service')->nullable()->after('password');
            $table->integer('authority_id')->nullable()->after('profile');
            $table->integer('district_id')->nullable()->after('service');
            $table->enum('status',['1','2'])->default('1')->comment('1= active,2=deactive')->after('district_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('login');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('role');
            $table->dropColumn('mobile');
            $table->dropColumn('status');
        });
    }
};
