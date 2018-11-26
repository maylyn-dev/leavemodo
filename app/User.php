<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'address', 'contact_no', 'birth_date', 'civil_status', 'date_hired', 'admin_notes', 'email', 'password', 'position_id', 'department_id', 'balance_id', 'current_balance_id',
    ];

    protected $dates = [
        'birth_date', 'date_hired',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setBirthDateAttribute($date) {
        $this->attributes['birth_date'] = Carbon::parse($date);
    }

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function department() {
        return $this->belongsTo('App\Department');
    }

    public function position() {
        return $this->belongsTo('App\Position');
    }

    public function balance() {
        return $this->hasOne('App\Balance');
    }

    public function applications() {
        return $this->hasMany('App\Application');
    }

    public function record() {
        return $this->hasManyThrough('App\Record', 'App\Application');
    }

    public function currentBalances() {
        return $this->hasMany('App\CurrentBalance');
    }
}
