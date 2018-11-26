<?php

namespace App\Http\Controllers\Traits;

use App\Balance;
use App\CurrentBalance;
use Illuminate\Support\Facades\Auth;


trait InitializeCurrentBalance
{
    public function addCurrentBalance($id) {
        $balance = Balance::findOrFail($id);
        $user_id = $balance->user->id;

        foreach($balance->types as $type) {
            $current = new CurrentBalance();
            $current->fiscal_year = $balance->fiscal_year;
            $current->user_id = $user_id;
            $current->type_id = $type->id;
            $current->consumed = 0;
            $current->remaining = $type->num_days;
            $current->save();
        }
    }
}
