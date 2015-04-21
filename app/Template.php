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

    public function courses() {
        return $this->hasMany('App\Course');
    }

}
