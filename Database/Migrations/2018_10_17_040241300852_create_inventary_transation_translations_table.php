<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventaryTransationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventary__transation_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('transation_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['transation_id', 'locale']);
            $table->foreign('transation_id')->references('id')->on('inventary__transations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventary__transation_translations', function (Blueprint $table) {
            $table->dropForeign(['transation_id']);
        });
        Schema::dropIfExists('inventary__transation_translations');
    }
}
