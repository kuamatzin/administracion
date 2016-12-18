<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenditureType extends Model
{
    protected $table = 'expenditure_types';

    protected $fillable = ['name'];

    public function general_expenditure()
    {
        return $this->belongsTo(GeneralExpenditure::class, 'general_expenditure_id');
    }

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }

    public function deductible_expenditures($formated = false)
    {
        $deductible_expenditures = $this->expenditures->where('deductible', 1)->sum('total');
        if ($formated) {
            return '$' . number_format($deductible_expenditures, 2);
        }
        return $deductible_expenditures;
    }

    public function no_deductible_expenditures($formated = false)
    {
        $no_deductible_expenditures =$this->expenditures->where('deductible', 0)->sum('total');
        if ($formated) {
            return '$' . number_format($no_deductible_expenditures, 2);
        }
        return $no_deductible_expenditures;
    }

    public function total($formated = false)
    {
        $total = $this->expenditures->sum('total');
        if ($formated) {
            return '$' . number_format($total);
        }
        return $total;
    }
}
