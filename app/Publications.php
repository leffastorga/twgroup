<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];


    public function comments()
    {
        return $this->hasMany(Comment::class, 'publication_id', 'id');
    }

    public function comments_aprobados() {
        return $this->comments()->where('status','=', 'APROBADO');
    }

    public function comments_aprobados_user($id) {
        return $this->comments()->where('status','!=','RECHAZADO')->where('user_id',$id);
    }

}
