<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentBalance extends Model
{
    protected $fillable = [
        'consumed', 'remaining', 'user_id', 'type_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function type() {
        return $this->belongsTo('App\Type');
    }
}
