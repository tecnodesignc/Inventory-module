<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventaryAcountTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventary__acount_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('acount_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['acount_id', 'locale']);
            $table->foreign('acount_id')->references('id')->on('inventary__acounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventary__acount_translations', function (Blueprint $table) {
            $table->dropForeign(['acount_id']);
        });
        Schema::dropIfExists('inventary__acount_translations');
    }
}
