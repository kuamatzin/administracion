<?php

namespace App\Http\Controllers;

use App\Construction;
use App\GeneralExpenditure;
use Charts;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{

    public function index()
    {
        $obras = Construction::all();
         return view('construction.index', compact('obras'));
    }

    public function show($id)
    {
        $obra = Construction::findOrFail($id);
        $chart = Charts::create('pie', 'highcharts')
            ->title('Total de gastos')
            ->labels(['Deducibles', 'No deducibles'])
            ->values([$obra->deductible_expenditures(), $obra->no_deductible_expenditures()])
            ->dimensions(1000,500)
            ->responsive(true);
        return view('construction.show', compact('obra', 'chart'));
    }
    public function create()
    {
        return view('construction.create');
    }
}
