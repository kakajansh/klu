<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('awards', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('course_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade');

			$table->foreign('course_id')
				  ->references('id')
				  ->on('courses')
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
		Schema::drop('awards');
	}

}
