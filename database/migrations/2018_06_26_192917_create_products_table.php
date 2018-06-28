<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('barcode')->nullable();
            $table->decimal('cost', 8,2)->nullable();
            $table->decimal('price', 8,2)->nullable();
            $table->integer('sales')->nullable();
            $table->decimal('total_sum', 8,2)->nullable();
            $table->integer('category_id')->nullable();
            $table->string('unit_type')->nullable();
            $table->longText('image')->nullable();
            $table->tinyInteger('favorite')->nullable();
            $table->tinyInteger('published')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
