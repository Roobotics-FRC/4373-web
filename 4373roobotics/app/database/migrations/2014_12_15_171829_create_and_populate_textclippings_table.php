<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAndPopulateTextclippingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('textclippings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->nullableTimestamps();
			$table->string('content', 2049);
			$table->string('page', 66);
		});
		DB::table('textclippings')->insert(
			array(
				array('page'=>'index', 'content'=>'test'),
				array('aboutbot'=>'index', 'content'=>'test'),
				array('aboutus'=>'index', 'content'=>'test')
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('textclippings');
	}

}
