<?php

use Illuminate\Database\Seeder;
use App\Template;

class TemplateTableSeeder extends Seeder {

    public function run()
    {
        DB::table('templates')->delete();

        $t1 = new Template();
        $t1->title = "Microsoft IT Academy";
        $t1->body  = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $t1->path  = "uploads/deneme.pdf";
        $t1->thumb = "uploads/deneme.png";
        $t1->settings = json_encode($t1->isettings);
        $t1->save();

        $t2 = new Template();
        $t2->title = "Laravel Web Artisan";
        $t2->body = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $t2->path = "uploads/laravel.pdf";
        $t2->thumb = "uploads/laravel.png";
        $t2->settings = json_encode($t2->isettings);
        $t2->save();

    }

}