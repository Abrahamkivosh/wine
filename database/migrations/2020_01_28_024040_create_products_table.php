<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');

            $table->double('size', 15, 8)->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->double('buying_price', 15, 8)->nullable();
            $table->double('selling_price', 15, 8)->nullable();
            $table->double('tax', 15, 8)->nullable();
            // $table->boolean('status')->nullable()->default(false);
            $table->integer('supplier_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers')
            ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade');




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
