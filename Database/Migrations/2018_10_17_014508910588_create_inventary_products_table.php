<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventaryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventary__products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('status');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->text('sku');
            $table->integer('quantity');
            $table->integer('stock');
            $table->integer('manufacter_id');
            $table->float('price');
            $table->float('weight');
            $table->float('width');
            $table->float('length');




            // Your fields
            $table->timestamps();



            $table->text('address')->nullable();
            $table->text('options')->default('')->nullable();
            $table->integer('type')->default(0)->unsigned();
            $table->integer('status')->default(0)->unsigned();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventary__products');
    }
}
