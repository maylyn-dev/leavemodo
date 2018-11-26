<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'application_id', 'name', 'file', 'mime', 'size',
    ];

    public function application() {
        return $this->belongsTo('App\Application');
    }
}
