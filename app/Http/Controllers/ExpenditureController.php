<?php

namespace App\Http\Controllers;

use App\ExpenditureType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenditureController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'concept' => 'required',
            'measure_unit' => 'required',
            'unit_cost' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'deductible' => 'required',
            'company' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag()->toArray();
        }

        $tipo_gasto = ExpenditureType::findOrFail($request->expenditure_type);
        $tipo_gasto->expenditures()->create($request->all());

        return "Exito";
    }
}
