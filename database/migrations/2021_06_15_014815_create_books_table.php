<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('category_id')->unsigned();
            $table->text('description');
            $table->foreign('category_id')->references('id')->on('categories')->onCascade('delete');
            $table->decimal('price',12,4);
            $table->year('publication_year');
            $table->integer('print_length');
            $table->string('publisher')->nullable();
            $table->string('image',500);
            $table->integer('quantity');
            $table->timestamps();
            
            $table->boolean('is_active')->default(0);
            $table->string('created_by',500);
            $table->string('updated_by',500)->nullable();
            $table->decimal('import_price',12,4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
