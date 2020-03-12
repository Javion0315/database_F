<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeyDoctorOperateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        // Schema::table('operate', function (Blueprint $table) {
        //     $table->foreign('op_id')->references('op_id')->on('operation')->onDelete('cascade')->onUpdate('cascade');
        // });
        // Schema::table('operate', function (Blueprint $table) {
        //     $table->foreign('doc_ssn')->references('ssn')->on('doctor')->onDelete('cascade')->onUpdate('cascade');
        // });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operate', function (Blueprint $table) {
            $table->dropForeign('operation_op_id_foreign');
        });
        Schema::table('operate', function (Blueprint $table) {
            $table->dropForeign('operation_ssn_foreign');
        });
    }
}
