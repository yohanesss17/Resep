<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignaMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signa_m', function (Blueprint $table) {
            $table->bigIncrements('signa_id');
            $table->string('signa_kode', '100');
            $table->string('signa_nama', '250');
            $table->text('additional_data');
            $table->dateTime('created_date');
            $table->integer('created_by');
            $table->integer('modified_count');
            $table->dateTime('last_modified_date');
            $table->integer('last_modified_by');
            $table->tinyInteger('is_deleted');
            $table->tinyInteger('is_active');
            $table->dateTime('deleted_date');
            $table->integer('deleted_by');
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
        Schema::dropIfExists('signa_m');
    }
}
