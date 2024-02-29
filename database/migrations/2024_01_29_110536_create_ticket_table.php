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

        Schema::create('ticket', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('type')->index()->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->integer('mobile')->index()->nullable();
            $table->string('district')->index()->nullable();
            $table->string('family_id')->index()->nullable();
            $table->string('source')->index()->nullable();
            $table->string('channel')->nullable();
            $table->integer('category_id')->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('sub_category_id')->index()->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->integer('new_sub_category_id')->index()->nullable();
            $table->foreign('new_sub_category_id')->references('id')->on('new_sub_categories');
            $table->bigInteger('assign_by')->nullable();
            $table->string('attachment')->nullable();
            $table->enum('auto_close')->default('0')->comment('1=yes,0=no');
            $table->string('ticket_number');
            $table->integer('assign_to');
            $table->dateTime('resloved_at');
            $table->longText('description')->nullable();
            $table->enum('priority')->default('0')->comment('0=low,1=medium,2=high');
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('ticketit');
    }
};
