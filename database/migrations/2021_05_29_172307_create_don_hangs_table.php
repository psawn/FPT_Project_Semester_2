<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('id_user')->unsigned();
            // eo co unsigned la eo forein key dc
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('diachi',200);
            $table->string('confirmed_by',500)->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('doanhthu')->nullable();
            $table->string('ghichu',500)->nullable();
            $table->string('phiship',100);
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
        Schema::dropIfExists('don_hangs');
    }
}
