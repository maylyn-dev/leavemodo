<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function admin() {
        return $this->hasOne('App\Admin');
    }

    public function manager() {
        return $this->hasOne('App\Manager');
    }

    public function employee() {
        return $this->hasOne('App\Employee');
    }
}
