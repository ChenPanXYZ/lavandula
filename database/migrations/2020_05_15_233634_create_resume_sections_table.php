<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('resume_sections', function (Blueprint $table) {

		;
		$table->string('resume_section_title');
		$table->integer('resume_section_display_order',);

        });
    }

    public function down()
    {
        Schema::dropIfExists('resume_sections');
    }
}