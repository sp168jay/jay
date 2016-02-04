<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDataRenameNameInTestsRenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testsRename', function (Blueprint $table) {
//            $table->renameColumn('dataRename','data');
            $table->dropColumn('dataRename');
            $table->string('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testsRename', function (Blueprint $table) {
//            $table->renameColumn('data','dataRename');
            $table->dropColumn('data');
            $table->string('dataRename');
        });
    }
}
