<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResumeSectionsItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resume_sections_items', function(Blueprint $table)
		{
			$table->foreign('resume_section_id', 'resume_sections_items_ibfk_1')->references('resume_section_id')->on('resume_sections')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('resume_section_id', 'resume_sections_items_ibfk_2')->references('resume_section_id')->on('resume_sections')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('resume_section_id', 'resume_section_id_constraint')->references('resume_section_id')->on('resume_sections')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('resume_sections_items', function(Blueprint $table)
		{
			$table->dropForeign('resume_sections_items_ibfk_1');
			$table->dropForeign('resume_sections_items_ibfk_2');
			$table->dropForeign('resume_section_id_constraint');
		});
	}

}
