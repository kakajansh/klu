<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('TemplateTableSeeder');
        $this->call('CourseTableSeeder');
		$this->call('RolesTableSeeder');
		// $this->call('AwardTableSeeder');
	}

}




