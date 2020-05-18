<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResumeSectionsItemsDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_sections_items_details', function(Blueprint $table)
		{
			$table->integer('resume_section_item_detail_id', true);
			$table->text('resume_section_item_detail_content', 65535);
			$table->integer('resume_section_item_id')->nullable()->index('resume_sections_items_details_ibfk_1');
			$table->integer('resume_section_item_detail_display_order');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_sections_items_details');
	}

}
