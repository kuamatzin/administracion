<?php

namespace App\Http\Controllers;

use App\Construction;
use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_id' => 'required',
            'concept' => 'required',
            'quantity' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag()->toArray();
        }
        $obra = Construction::findOrFail($request->construction);
        $obra->incomes()->create($request->all());

        return "Exito";
    }

    public function show($obra_id)
    {
        $obra = Construction::findOrFail($obra_id);

        return view('ingresos.show', compact('obra'));
    }
}
