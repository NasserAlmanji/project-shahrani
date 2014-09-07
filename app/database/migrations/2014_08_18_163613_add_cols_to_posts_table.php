<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColsToPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			if (Schema::hasColumn('posts','type')) {
			    $table->dropColumn('type');
			}

		    $table->string('message_type');
		    $table->string('type_long_short_quick')->nullable();
		    $table->string('message_state')->nullable();
		    
			if (!Schema::hasColumn('posts','user_id')) {
		    	$table->integer('user_id')->unsigned()->nullable();
			}

			if (!Schema::hasColumn('posts','company_id')) {
		    	$table->integer('company_id')->unsigned()->nullable();
			}
		   
		});

		Schema::table('posts', function(Blueprint $table)
		{

		    $table->foreign('user_id')
      		->references('id')->on('users')
      		->onDelete('cascade');
			$table->foreign('company_id')
      		->references('id')->on('companies')
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
		Schema::table('posts', function(Blueprint $table)
		{
			
		});
	}

}
