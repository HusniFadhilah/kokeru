<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            $table->foreignId('cs_id');
            $table->foreignId('schedule_id');
            $table->dateTime('date_time');
            $table->string('file_1');
            $table->string('file_2');
            $table->string('file_3');
            $table->string('file_4');
            $table->string('file_5');
            $table->string('file_5');
            $table->boolean('status')->comment('0-belum,1-sudah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
