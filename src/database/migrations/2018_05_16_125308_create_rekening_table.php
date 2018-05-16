<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateRekeningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekenings', function(Blueprint $table) {
			$table->increments('id');
			$table->uuid('uuid', 191)->unique();
			$table->string('kode', 191)->unique();
            $table->string('nama', 191)->unique();
            $table->integer('level')->unsigned()->index();
            NestedSet::columns($table);
			$table->integer('user_id')->unsigned()->index();
            $table->integer('user_update')->unsigned()->index();
            $table->timestamps();
			$table->softDeletes();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rekenings');
    }
}
