<?php

namespace App;

use App\Account;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public $fillable = ['account_id', 'concept', 'quantity', 'type'];

    public function construction()
    {
        return $this->belongsTo(Construction::class);
    }

    public function getQuantityAttribute($value)
    {
        return number_format($value, 2);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
