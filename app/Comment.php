<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['article_id', 'content', 'name'];
    public function Comments()
    {
        return $this->belongsToMany(Comment::class);
    }
}
