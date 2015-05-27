<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['ad', 'soyad', 'ogrno', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    // Kullaniciyi veritabana kaydetmeden once sifresini hashleme icin
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = \Hash::make($password);
    // }

    public function roles()
    {
        return $this->belongsToMany('App\Authority\Role');
    }

    public function permissions()
    {
        return $this->hasMany('App\Authority\Permission');
    }

    public function hasRole($key)
    {
        $hasRole = false;
        foreach ($this->roles as $role) {
            if ($role->name === $key) {
                $hasRole = true;
                break;
            }
        }

        return $hasRole;
    }

    public function getFullnameAttribute()
    {
        return $this->ad . ' ' . $this->soyad;
    }

	// public function courses()
	// {
	// 	return $this->belongsToMany('\App\Course', 'awards', 'user_id', 'course_id');
	// }
    public function courses()
    {
        return $this->belongsToMany('\App\Course');
    }

    public function awards() {
        return $this->hasMany('App\Award', 'course_user');
    }
}