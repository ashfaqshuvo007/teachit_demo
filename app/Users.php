<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'name','email','avatar','password'
    ];

    public function videos(){
        return $this->hasMany(Videos::class,'videos_id');
    }
    public function comments()
    {
        return $this->hasMany(Comments::class,'videos_id');
    }

    public function likes()
    {
        return $this->hasMany(Likes::class,'videos_id');
    }
}
