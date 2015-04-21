<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	//
    protected $fillable = [
        'title',
        'price',
        'template_id'
    ];

    public function template()
    {
        return $this->belongsTo('App\Template', 'template_id');
    }

    public function users()
    {
        return $this->belongsToMany('\App\User', 'awards', 'courseid', 'userid');
    }

}
