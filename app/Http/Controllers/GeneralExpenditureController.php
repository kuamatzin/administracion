<?php

namespace App\Http\Controllers;

use App\Construction;
use App\GeneralExpenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralExpenditureController extends Controller
{

    public function show($id)
    {
        $gasto_general = GeneralExpenditure::findOrFail($id);

         return view('gasto_general.show', compact('gasto_general'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag()->toArray();
        }
        $obra = Construction::findOrFail($request->construction);
        $obra->general_expenditures()->create($request->all());

        return "Exito";
    }
}
