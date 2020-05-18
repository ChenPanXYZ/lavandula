<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->integer('comment_id', true);
			$table->string('comment_author', 320)->nullable();
			$table->string('comment_email', 320)->nullable();
			$table->char('comment_content')->nullable();
			$table->char('comment_approved', 1)->nullable()->default('f');
			$table->dateTime('comment_date')->nullable();
			$table->dateTime('comment_date_gmt')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
