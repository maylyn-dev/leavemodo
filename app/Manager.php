<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'role_id', 'department_id',
    ];

    public function department() {
        return $this->belongsTo('App\Department');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }
}
