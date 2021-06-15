<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions_books', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("book_id")->unsigned();
            $table->foreign('book_id')->references('id')->on('books');
            $table->bigInteger("promotion_id")->unsigned();
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->boolean('is_active');
            $table->string('created_by',500);
            $table->string('updated_by',500)->nullable();
            $table->timestamps();
        });
            DB::statement('ALTER TABLE promotions_books ADD CONSTRAINT chk_promotions_books unique (book_id,promotion_id);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions_books');
    }
}
