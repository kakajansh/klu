<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Course extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

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
        return $this->belongsToMany('\App\User', 'awards', 'course_id', 'user_id');
    }

}
