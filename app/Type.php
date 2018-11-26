<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name', 'description', 'min_years_service', 'num_days', 'max_days', 'for_male', 'for_female', 'convert_to_cash', 'require_docs', 'carry_over', 'current_balance_id',
    ];

    public function users() {
        return $this->hasManyThrough('App\User', 'App\Balance');
    }

    public function balances() {
        return $this->belongsToMany('App\Balance');
    }

    public function currentBalances() {
        return $this->hasMany('App\CurrentBalance');
    }
}
