<?php

namespace App\Http\Controllers;

use App\ExpenditureType;
use App\GeneralExpenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenditureTypeController extends Controller
{
    public function show($id){
        $tipo_gasto = ExpenditureType::findOrFail($id);

        return view('tipo_gasto.show', compact('tipo_gasto'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag()->toArray();
        }
        $gasto_general = GeneralExpenditure::findOrFail($request->gasto_general);
        $gasto_general->expenditure_types()->create($request->all());

        return "Exito";
    }
}
