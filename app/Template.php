<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model {

	//
    // protected $fillable = [
    //     'title',
    //     'body',
    //     'path',
    //     'settings'
    // ]
    public $isettings = [
        'name_top' => '50',
        'name_left' => '100',
        'name_width' => '200',
        'name_height' => '40',
        'name_font' => 'Arial',
        'name_size' => '10',

        'date_top' => '100',
        'date_left' => '100',
        'date_width' => '100',
        'date_height' => '100',
        'date_font' => 'Arial',
        'date_size' => '10',
    ];

    public function courses() {
        return $this->hasMany('App\Course');
    }

}
