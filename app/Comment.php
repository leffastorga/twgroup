<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['publication_id', 'content', 'status', 'user_id'];

    public function publications()
    {
        return $this->belongsTo(Publications::class, 'publication_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
