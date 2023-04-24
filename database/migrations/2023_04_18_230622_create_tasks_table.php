<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// ! COMMENTANDO EVITO IL REFRESH SEED DELLA TABELLA TASKS
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    // Schema::create('tasks', function (Blueprint $table) {
    //     $table->id();
    //     $table->string('title');
    //     $table->text('description')->nullable();
    //     $table->timestamp('completed_at')->nullable();
    //     $table->timestamps();
    // });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('tasks');
    }
};