<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title', 'body', 'closed', 'img_url', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
