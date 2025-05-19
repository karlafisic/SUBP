<?php

namespace App\Http\Controllers;

use App\Models\StudentskiDom;
use Illuminate\Http\Request;

class StudentskiDomController extends Controller
{
    /**
     * Prikazuje popis svih studentskih domova.
     */
    public function index()
    {
        $domovi = StudentskiDom::all();
        return view('studentski_dom.index', compact('domovi'));
    }

    /**
     * Prikazuje formu za dodavanje novog studentskog doma.
     */
    public function create()
    {
        return view('studentski_dom.create');
    }

    /**
     * Sprema novi studentski dom u bazu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'adresa' => 'nullable|string|max:255',
            'kapacitet' => 'required|integer|min:0',
            'kapacitet_menze' => 'required|integer|min:0',
        ]);

        StudentskiDom::create($request->all());

        return redirect()->route('studentski_dom.index')->with('success', 'Studentski dom je uspješno dodan.');
    }

    /**
     * Prikazuje formu za uređivanje određenog doma.
     */
    public function edit($id)
    {
        $studentskiDom = StudentskiDom::findOrFail($id);
        return view('studentski_dom.edit', compact('studentskiDom'));
    }

    /**
     * Ažurira određeni dom u bazi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'adresa' => 'nullable|string|max:255',
            'kapacitet' => 'required|integer|min:0',
            'kapacitet_menze' => 'required|integer|min:0',
        ]);

        $dom = StudentskiDom::findOrFail($id);
        $dom->update($request->all());

        return redirect()->route('studentski_dom.index')->with('success', 'Studentski dom je uspješno ažuriran.');
    }

    /**
     * Briše određeni dom iz baze.
     */
    public function destroy($id)
    {
        $dom = StudentskiDom::findOrFail($id);
        $dom->delete();

        return redirect()->route('studentski_dom.index')->with('success', 'Studentski dom je uspješno obrisan.');
    }
}
