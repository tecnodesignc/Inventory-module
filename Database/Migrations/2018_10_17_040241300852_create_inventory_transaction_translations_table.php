<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTransactionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory__transaction_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->text('description');

            $table->integer('transaction_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['transaction_id', 'locale']);
            $table->foreign('transaction_id')->references('id')->on('inventory__transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory__transaction_translations', function (Blueprint $table) {
            $table->dropForeign(['transaction_id']);
        });
        Schema::dropIfExists('inventory__transaction_translations');
    }
}
