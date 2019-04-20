<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('criterias');

        Schema::create('criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('criteria_name')->nullable();
            $table->integer('id_parent')->nullable();
            $table->integer('id_hierarchies')->nullable();
            $table->timestamps();
        });

        Schema::create('priority', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_criteria_1')->nullable();
            $table->integer('id_criteria_2')->nullable();
            $table->integer('priority')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('criteria_name');
            $table->integer('id_parent')->nullable();
            $table->integer('id_hierarchies');
            $table->integer('priority')->nullable();
            $table->timestamps();
        });

        Schema::dropIfExists('criterias');
        Schema::dropIfExists('priority');

    }
}
