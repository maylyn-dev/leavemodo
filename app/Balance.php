<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'user_id', 'fiscal_year',
    ];

    protected $dates = [
        'fiscal_year',
    ];

    public function setFiscalYearAttribute($date) {
        $this->attributes['fiscal_year'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function types() {
        return $this->belongsToMany('App\Type');
    }

    public function current() {
        return $this->hasOne('App\CurrentBalance');
    }

    public function getTypeListAttribute() {
        return $this->types->lists('id');
    }
}
