<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResumeSectionsItemsDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resume_sections_items_details', function(Blueprint $table)
		{
			$table->foreign('resume_section_item_id', 'resume_sections_items_details_ibfk_1')->references('resume_section_item_id')->on('resume_sections_items')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('resume_section_item_id', 'resume_sections_items_details_ibfk_2')->references('resume_section_item_id')->on('resume_sections_items')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('resume_section_item_id', 'resume_section_item_id_constraint')->references('resume_section_item_id')->on('resume_sections_items')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('resume_sections_items_details', function(Blueprint $table)
		{
			$table->dropForeign('resume_sections_items_details_ibfk_1');
			$table->dropForeign('resume_sections_items_details_ibfk_2');
			$table->dropForeign('resume_section_item_id_constraint');
		});
	}

}
