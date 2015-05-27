<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model {

    // varsayilan deger awards
    // veritabanindaki tablo ismine degistiriyoruz
    protected $table = 'course_user';

    protected $fillable = [
        'course_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
