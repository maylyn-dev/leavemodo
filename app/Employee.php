<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'role_id',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }
}
