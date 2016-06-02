<?php

namespace App;
use App\Contest;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Information;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname','user_name','department','code','university','phone','student_id','is_a', 'email', 'password','active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contests(){
        return $this->hasMany(Contest::class)->orderBy('date','DESC');
    }
    public function information()
    {
        return $this->hasOne(Information::class);
    }

    public function getAvatarUrl(){
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=300";
    }


}
