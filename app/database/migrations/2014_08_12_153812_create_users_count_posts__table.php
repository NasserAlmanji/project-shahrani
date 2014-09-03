<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersCountPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_count_posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->timestamp('lastview');
			$table->timestamps();
		});

		Schema::table('users_count_posts',function($table) {
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
		Schema::drop('users_count_posts');
	}

}
