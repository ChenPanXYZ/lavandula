<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResumeSectionsItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_sections_items', function(Blueprint $table)
		{
			$table->integer('resume_section_item_id', true);
			$table->string('resume_section_item_title');
			$table->integer('resume_section_id')->nullable()->index('resume_sections_items_ibfk_2');
			$table->integer('resume_section_item_display_order');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_sections_items');
	}

}
