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
        Schema::table('tickets', function (Blueprint $table) {
            $table->renameColumn('new_sub_category_id', 'child_sub_category_id')->nullable()->change();
            $table->string('ticket_number')->nullable()->change();
            $table->integer('assign_to')->nullable()->change();
            $table->dateTime('resloved_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {

        });
    }
};
