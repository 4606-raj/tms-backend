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
        Schema::enableForeignKeyConstraints();

        Schema::create('ticket_remarks', function (Blueprint $table) {
            $table->id();
            $table->text('remark');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->integer('assign_to');
            $table->string('action')->nullable();
            $table->enum('status',['1','2'])->default('1')->comment('1= active,2=deactive');
            $table->softDeletes();
            $table->timestamps();
        });

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_remarks');
    }
};
