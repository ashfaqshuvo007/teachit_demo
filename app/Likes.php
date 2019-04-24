<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'likes';

    public function videos()
    {
        return $this->belongsTo(Videos::class,'id');
    }

    public function users()
    {
        return $this->belongsTo(Users::class,'id');
    }
}
