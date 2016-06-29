<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title', 'body', 'closed'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
