<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    protected $fillable = ['concept', 'measure_unit', 'unit_cost', 'quantity', 'total', 'deductible'];

    public function expenditure_type()
    {
         return $this->hasMany(ExpenditureType::class, 'expenditure_type_id');
    }

    public function general_expenditure()
    {
        return $this->expenditure_type->general_expenditure();
    }

    public function getDeductible()
    {
        return $this->deductible ? 'Deducible' : 'No deducible';
    }

    public function getUnitCost()
    {
        return '$' . number_format($this->unit_cost, 2);
    }

    public function getTotal()
    {
        return '$' . number_format($this->total, 2);
    }
}
