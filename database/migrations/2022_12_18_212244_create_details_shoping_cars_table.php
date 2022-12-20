<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsShopingCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_shoping_cars', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity');

            /**
             * Foreing keys
             */

            // Relacion con carts
            $table->unsignedBigInteger('shoping_car_id')->unsigned();
            $table->foreign('shoping_car_id')->references('id')->on('shoping_cars')->onDelete('cascade');

            // Relacion con produtcs
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

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
        Schema::dropIfExists('details_shoping_cars');
    }
}
