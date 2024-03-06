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
        Schema::create('tickets', function (Blueprint $table) {
            $table->integer('id');
            $table->string('type')->index()->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->integer('mobile')->index()->nullable();
            $table->string('district')->index()->nullable();
            $table->string('family_id')->index()->nullable();
            $table->string('source')->index()->nullable();
            $table->string('channel')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('new_sub_category_id');
            $table->foreign('new_sub_category_id')->references('id')->on('categories');
            $table->bigInteger('assign_by')->nullable();
            $table->string('attachment')->nullable();
            $table->enum('auto_close',['0', '1'])->default('0')->comment('0=no,1=yes');
            $table->string('ticket_number');
            $table->integer('assign_to');
            $table->dateTime('resloved_at');
            $table->longText('description')->nullable();
            $table->enum('priority',['0', '1','2'])->default('0')->comment('0=low,1=medium,2=high');
            $table->string('remark')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
