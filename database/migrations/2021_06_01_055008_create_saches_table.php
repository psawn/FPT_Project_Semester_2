<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_danhmuc')->unsigned();
            $table->foreign('id_danhmuc')->references('id')->on('danh_mucs');
            $table->string('tensach',200);
            $table->string('slug',200);
            $table->string('tentacgia',200);
            $table->string('nhaxuatban',200);
            $table->year('namxuatban');
            $table->string('noinhap',200)->nullable();
            $table->string('created_by',500);
            $table->string('updated_by',500)->nullable();
            $table->decimal('gianhap',12,4);
            $table->decimal('giaban',12,4);
            $table->integer('tap')->nullable();
            $table->string('anhdaidien',500);
            $table->integer('soluong');
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('saches');
    }
}
