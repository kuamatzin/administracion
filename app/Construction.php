<?php

namespace App;

use App\GeneralExpenditure;
use App\Income;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    protected $fillable = ['name'];

    public function general_expenditures()
    {
        return $this->hasMany(GeneralExpenditure::class);
    }

    public function deductible_expenditures($formated = false)
    {
        $deductible_expenditures = 0;
        foreach ($this->general_expenditures as $key => $general_expenditure) {
            $deductible_expenditures =  $deductible_expenditures + $general_expenditure->general_deductible();
        }
        return $formated ? '$' .  number_format($deductible_expenditures, 2) : $deductible_expenditures;
    }

    public function no_deductible_expenditures($formated = false)
    {
        $no_deductible_expenditures = 0;
        foreach ($this->general_expenditures as $key => $general_expenditure) {
            $no_deductible_expenditures =  $no_deductible_expenditures + $general_expenditure->general_no_deductible();
        }
        return $formated ? '$' .  number_format($no_deductible_expenditures, 2) : $no_deductible_expenditures;
    }

    public function total($formated = false)
    {
        $total = 0;
        foreach ($this->general_expenditures as $key => $general_expenditure) {
            $total =  $total + $general_expenditure->total();
        }

        return $formated ? '$' .  number_format($total, 2) : $total;
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function total_incomes($formated = false)
    {
        return $formated ? '$' .  number_format($this->incomes->sum('quantity'), 2) : $this->incomes->sum('quantity');
    }
}
