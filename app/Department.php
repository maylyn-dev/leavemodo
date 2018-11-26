<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function manager() {
        return $this->hasOne('App\Manager');
    }

    public function users() {
        return $this->hasMany('App\User');
    }
}
