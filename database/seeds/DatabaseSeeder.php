<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Template;
use App\Course;
use App\Award;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		$this->call('TemplateTableSeeder');
		$this->call('CourseTableSeeder');
		// $this->call('AwardTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['email' => 'foo@bar.com']);
    }

}

class TemplateTableSeeder extends Seeder {

    public function run()
    {
        DB::table('templates')->delete();

        $t = new Template();
        $t->title = "Microsoft IT Academy";
        $t->body  = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $t->path  = "uploads/deneme.pdf";
        $t->thumb = "uploads/deneme.png";
        $t->settings = json_encode(array("title_top" => 10,
        								 "title_left" => 10,
        								 "title_font" => "Arial",
        								 "title_font_size" => 24));
        $t->save();

        $t2 = new Template();
        $t2->title = "Laravel Web Artisan";
        $t2->body = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $t2->path = "uploads/laravel.pdf";
        $t2->thumb = "uploads/laravel.png";
        $t2->settings = json_encode(array("title_top" => 30,
        								 "title_left" => 30,
        								 "title_font" => "Arial",
        								 "title_font_size" => 24));
        $t2->save();

    }

}

class CourseTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        $c = new Course();
        $c->title = "Bilge Adam Microsoft";
        $c->price = 50;
        $c->template_id = Template::first()->id;
        $c->save();
    }

}

class AwardTableSeeder extends Seeder {

    public function run()
    {
        DB::table('awards')->delete();

    }

}
