<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Template;

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