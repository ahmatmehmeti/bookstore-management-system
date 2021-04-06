<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('created_by');
            $table->string('created_by_role')->nullable();
            $table->unsignedBigInteger('postier_id')->nullable();
            $table->enum('status', ['pending', 'delivering', 'delivered'])->default('pending');

            $table->string('city')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->integer('qty');
            $table->string('comment')->nullable();



            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('postier_id')->references('id')->on('users');

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
        Schema::dropIfExists('orders');
    }
}
