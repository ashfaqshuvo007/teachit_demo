<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primarykey = 'comment_id';


    public function videos()
    {
        return $this->belongsTo(Videos::class,'comment_id');
    }

    public function users(){
        return $this->belongsTo(Users::class,'comment_id');
    }
}
