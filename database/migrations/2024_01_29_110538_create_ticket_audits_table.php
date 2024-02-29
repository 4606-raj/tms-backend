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
        Schema::disableForeignKeyConstraints();

        Schema::create('ticket_audits', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->text('operation');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('ticket');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_audits');
    }
};
