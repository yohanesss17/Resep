<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatalkesMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obatalkes_m', function (Blueprint $table) {
            $table->bigIncrements('obatalkes_id');
            $table->string('obatalkes_kode', '100');
            $table->string('obatalkes_nama', '250');
            $table->decimal('stok', 15, 2);
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
        Schema::dropIfExists('obatalkes_m');
    }
}
