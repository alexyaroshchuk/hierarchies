<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChaneTypeField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alternatives', function (Blueprint $table) {
            $table->dropColumn('vector_priority');
        });
        Schema::table('alternatives', function (Blueprint $table) {
            $table->double('vector_priority')->nullable()->after('id_hierarchies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
