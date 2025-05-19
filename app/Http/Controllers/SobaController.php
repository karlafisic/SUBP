<?php

namespace App\Http\Controllers;

use App\Models\Soba;
use App\Models\StudentskiDom;
use App\Models\TipSobe;
use Illuminate\Http\Request;

class SobaController extends Controller
{
    
    public function index()
    {
        
        $sobe = Soba::with(['studentski_dom', 'tip_sobe'])->get();
        return view('soba.index', compact('sobe'));
    }

    
    public function create()
    {
        $domovi = StudentskiDom::all();
        $tipoviSoba = TipSobe::all();
        return view('soba.create', compact('domovi', 'tipoviSoba'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'broj_sobe' => 'required|integer',
            'id_doma' => 'required|exists:studentski_dom,id',
            'id_tipa_sobe' => 'required|exists:tip_sobe,id',
        ]);

        Soba::create($request->all());

        return redirect()->route('soba.index')->with('success', 'Soba je uspješno dodana.');
    }

    public function edit($id)
    {
        $soba = Soba::findOrFail($id);
        $domovi = StudentskiDom::all();
        $tipoviSoba = TipSobe::all();
        return view('soba.edit', compact('soba', 'domovi', 'tipoviSoba'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'broj_sobe' => 'required|integer',
            'id_doma' => 'required|exists:studentski_dom,id',
            'id_tipa_sobe' => 'required|exists:tip_sobe,id',
        ]);

        $soba = Soba::findOrFail($id);
        $soba->update($request->all());

        return redirect()->route('soba.index')->with('success', 'Podaci sobe su uspješno ažurirani.');
    }

    
    public function destroy($id)
    {
        $soba = Soba::findOrFail($id);
        $soba->delete();

        return redirect()->route('soba.index')->with('success', 'Soba je uspješno obrisana.');
    }
}
