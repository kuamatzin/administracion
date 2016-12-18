<?php

namespace App;

use App\Construction;
use App\ExpenditureType;
use Illuminate\Database\Eloquent\Model;

class GeneralExpenditure extends Model
{
    protected $table = 'general_expenditures';

    protected $fillable = ['name'];

    public function expenditure_types()
    {
        return $this->hasMany(ExpenditureType::class);
    }

    public function construction()
    {
        return $this->belongsTo(Construction::class);
    }

    public function general_deductible($formated = false)
    {
        $general_deductible = 0;
        foreach ($this->expenditure_types as $key => $expenditure_type) {
            $general_deductible = $general_deductible +  $expenditure_type->deductible_expenditures();
        }
        if ($formated) {
            return '$' . number_format($general_deductible, 2);
        }
        return $general_deductible;
    }

    public function general_no_deductible($formated = false)
    {
        $general_no_deductible = 0;
        foreach ($this->expenditure_types as $key => $expenditure_type) {
            $general_no_deductible = $general_no_deductible +  $expenditure_type->no_deductible_expenditures();
        }
        if ($formated) {
            return '$' . number_format($general_no_deductible, 2);
        }
        return $general_no_deductible;
    }

    public function total($formated = false)
    {
        $total = 0;
        foreach ($this->expenditure_types as $key => $expenditure_type) {
            $total = $total +  $expenditure_type->total();
        }
        if ($formated) {
            return '$' . number_format($total, 2);
        }
        return $total;
    }
}
