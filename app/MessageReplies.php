<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageReplies extends Model
{
    protected $fillable = [
        'reply'
    ];

    public function message()
    {
        return $this->belongsTo('App\Message');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
