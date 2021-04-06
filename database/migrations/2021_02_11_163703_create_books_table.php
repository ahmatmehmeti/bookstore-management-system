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
            $table->bigIncrements('id');
            $table->string('title')->default('No title given');
            $table->string('description',6000);
            $table->string('author');
            $table->string('about_author',6000);
            $table->string('publisher');
            $table->date('date_published');
            $table->unsignedBigInteger('category_id');
           /* $table->foreign('category_id')->references('id')->on('categories');*/
            $table->string('image')->nullable();
            $table->integer('qty');
            $table->double('price');
            $table->integer('pages');
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
        Schema::dropIfExists('books');
    }
}
