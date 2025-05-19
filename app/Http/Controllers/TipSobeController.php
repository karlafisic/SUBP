<?php

namespace App\Http\Controllers;

use App\Models\TipSobe;
use Illuminate\Http\Request;

class TipSobeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoviSoba = TipSobe::all();
        return view('tip_sobe.index', compact('tipoviSoba'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tip_sobe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
        ]);

        TipSobe::create([
            'naziv' => $request->naziv,
        ]);

        return redirect()->route('tip_sobe.index')->with('success', 'Tip sobe je uspješno dodan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logika za prikaz pojedinačnog tipa sobe, ako je potrebno
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipSobe = TipSobe::findOrFail($id);
        return view('tip_sobe.edit', compact('tipSobe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'naziv' => 'required|max:255',
        ]);

        $tipSobe = TipSobe::findOrFail($id);
        $tipSobe->update([
            'naziv' => $request->naziv,
        ]);

        return redirect()->route('tip_sobe.index')->with('success', 'Tip sobe je uspješno ažuriran.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipSobe = TipSobe::findOrFail($id);
        $tipSobe->delete();

        return redirect()->route('tip_sobe.index')->with('success', 'Tip sobe je uspješno obrisan.');
    }
}
