<?php

use Illuminate\Database\Seeder;
use App\Template;

class TemplateTableSeeder extends Seeder {

    public function run()
    {
        DB::table('templates')->delete();

        $t = new Template();
        $t->title = "Microsoft IT Academy";
        $t->body  = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $t->path  = "uploads/deneme.pdf";
        $t->thumb = "uploads/deneme.png";
        $t->settings = json_encode(array("name_top" => 10,
                                         "name_left" => 10,
                                         "name_width" => 150,
                                         "name_height" => 30,
                                         "name_font" => "Arial",
                                         "name_font_size" => 24));
        $t->save();

        $t2 = new Template();
        $t2->title = "Laravel Web Artisan";
        $t2->body = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $t2->path = "uploads/laravel.pdf";
        $t2->thumb = "uploads/laravel.png";
        $t2->settings = json_encode(array("name_top" => 30,
                                         "name_left" => 30,
                                         "name_width" => 100,
                                         "name_height" => 20,
                                         "name_font" => "Arial",
                                         "name_font_size" => 24));
        $t2->save();

    }

}