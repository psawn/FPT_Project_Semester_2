<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateKhuyenMaiSachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyen_mai_saches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_sach")->unsigned();
            $table->foreign('id_sach')->references('id')->on('saches');
            $table->integer("id_khuyenmai")->unsigned();
            $table->foreign('id_khuyenmai')->references('id')->on('khuyen_mais');
            $table->boolean('is_active');
            $table->string('created_by',500);
            $table->string('updated_by',500)->nullable();
            $table->timestamps();
        });
            DB::statement('ALTER TABLE khuyen_mai_saches ADD CONSTRAINT chk_khuyenmai_sach unique (id_sach,id_khuyenmai);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyen_mai_saches');
    }
}
