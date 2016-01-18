<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserxgamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('refs', function(Blueprint $table)
		{
			$table->integer('game_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('score');
			$table->timestamps();

			//Adding the composite primary keys
			$table->primary(array('game_id', 'user_id'));
			//Adding the foreign key constraints
			$table->foreign('game_id')
				->references('game_id')->on('games')
				->onDelete('cascade');
			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('refs');
	}

}
