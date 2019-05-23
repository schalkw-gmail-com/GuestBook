<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content',
        'title'
    ];

    public function replies()
    {
        return $this->hasMany('App\MessageReplies');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
