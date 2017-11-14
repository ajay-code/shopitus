<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->integer('product_category_id')->unsigned();
            $table->integer('deal_type_id')->unsigned()->nullable();
            $table->integer('store_id')->unsigned()->nullable();
            $table->string('image')->nullable();
            $table->string('link', 3000);
            $table->text('text');
            $table->timestamps();
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreign('deal_type_id')->references('id')->on('deal_types');
            $table->foreign('store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
