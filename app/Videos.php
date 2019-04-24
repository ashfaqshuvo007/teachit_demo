<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'videos_id';

    public function users()
    {
        return $this->belongsTo(Users::class,'user_id');
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
