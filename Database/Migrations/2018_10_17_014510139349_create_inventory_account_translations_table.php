<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryAccountTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory__account_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            // Your translatable fields

            $table->integer('account_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['account_id', 'locale']);
            $table->foreign('account_id')->references('id')->on('inventory__accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory__account_translations', function (Blueprint $table) {
            $table->dropForeign(['account_id']);
        });
        Schema::dropIfExists('inventory__account_translations');
    }
}
