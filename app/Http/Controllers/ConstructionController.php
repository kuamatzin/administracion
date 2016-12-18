<?php

namespace App\Http\Controllers;

use App\Construction;
use App\GeneralExpenditure;
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
        return view('construction.show', compact('obra'));
    }
    public function create()
    {
        return view('construction.create');
    }
}
