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

    public function quantity($formated = false)
    {
        return $formated ? '$' . number_format($this->quantity) : $this->quantity;
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
