<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book', function (Blueprint $table) {
            $table->bigInteger("genre_id")->after('id')->unsigned();
            $table->foreign('genre_id')
                ->references('id')
                ->on('genre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book', function (Blueprint $table) {
            $table->bigInteger("genre_id")->unsigned();
            $table->foreign('genre_id')
                ->references('id')
                ->on('genre')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
};
