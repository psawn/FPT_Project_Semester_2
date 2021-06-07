<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDanhMucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_mucs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tendanhmuccha',100);
            $table->integer('iddanhmuccha');
            $table->string('tendanhmuc',100);
            $table->string('slug',100);
            $table->string('updated_by',500)->nullable();
            $table->timestamps();
        });
        DB::statement("CREATE FUNCTION NAME_SLUG(tendanhmuccha VARCHAR(100),tendanhmuc VARCHAR(100)) 
                        RETURNS VARCHAR(100)
                        RETURN LOWER(REPLACE(CONCAT('/',tendanhmuccha,'/',tendanhmuc), ' ', '-'));

                        CREATE TRIGGER tg_danhmuc_insert
                        BEFORE INSERT ON danh_mucs
                        FOR EACH ROW
                        SET NEW.slug = NAME_SLUG(NEW.tendanhmuccha,NEW.tendanhmuc);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_mucs');
    }
}
