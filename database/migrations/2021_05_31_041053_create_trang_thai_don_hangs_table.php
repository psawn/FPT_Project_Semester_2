<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTrangThaiDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trang_thai_don_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_donhang')->unsigned();
            $table->foreign('id_donhang')->references('id')->on('don_hangs');
            $table->integer('trangthai');
            $table->string('confirmed_by',500)->nullable();
            $table->timestamp('confirmed_at')->nullable();
            
        });
            DB::statement('ALTER TABLE trang_thai_don_hangs ADD CONSTRAINT chk_trangthai_donhang unique(id_donhang,trangthai)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trang_thai_don_hangs');
    }
}
