<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateKhuyenMaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->increments("id");
            $table->string('tieude',500);
            $table->integer('phantramkhuyenmai');
            $table->longText('noidung');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->boolean('is_active');
            $table->string('created_by',500)->nullable();
            $table->string('updated_by',500)->nullable();
            $table->timestamps();
        });
            DB::statement('ALTER TABLE khuyen_mais ADD CONSTRAINT chk_phantramkhuyenmai CHECK (phantramkhuyenmai <= 100 AND phantramkhuyenmai>=0);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyen_mais');
    }
}
