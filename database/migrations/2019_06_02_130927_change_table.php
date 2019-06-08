<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('priority', function (Blueprint $table) {
            $table->dropColumn('priority');
//            $table->double('priority')->nullable();
        });
        Schema::table('priority', function (Blueprint $table) {
//            $table->dropColumn('priority');
            $table->double('priority')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('priority', function (Blueprint $table) {
            $table->dropColumn('priority');
//            $table->double('priority')->nullable();
        });
        Schema::table('priority', function (Blueprint $table) {
//            $table->dropColumn('priority');
            $table->integer('priority')->nullable();
        });
    }
}
