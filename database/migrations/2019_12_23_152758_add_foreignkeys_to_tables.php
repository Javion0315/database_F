<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('operation', function (Blueprint $table) {
            $table->foreign('char_no')->references('char_no')->on('patient')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operation', function (Blueprint $table) {
            $table->dropForeign('operation_char_no_foreign');
        });
    }
}
