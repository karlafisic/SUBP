<?php

namespace App\Http\Controllers;

use App\Models\Fakultet;
use Illuminate\Http\Request;

class FakultetController extends Controller
{
    // Prikaz liste fakulteta
    public function index()
    {
        $fakulteti = Fakultet::all();
        return view('fakultet.index', compact('fakulteti'));
    }

    // Prikaz forme za kreiranje novog fakulteta
    public function create()
    {
        return view('fakultet.create');
    }

    // Spremanje novog fakulteta u bazu
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'adresa' => 'required|string|max:255',
        ]);

        Fakultet::create($request->all());

        return redirect()->route('fakultet.index')->with('success', 'Fakultet je uspješno dodan.');
    }

    // Prikaz forme za uređivanje postojećeg fakulteta
    public function edit($id)
    {
        $fakultet = Fakultet::findOrFail($id);
        return view('fakultet.edit', compact('fakultet'));
    }

    // Ažuriranje fakulteta u bazi
    public function update(Request $request, $id)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'adresa' => 'required|string|max:255',
        ]);

        $fakultet = Fakultet::findOrFail($id);
        $fakultet->update($request->all());

        return redirect()->route('fakultet.index')->with('success', 'Fakultet je uspješno ažuriran.');
    }

    // Brisanje fakulteta iz baze
    public function destroy($id)
    {
        $fakultet = Fakultet::findOrFail($id);
        $fakultet->delete();

        return redirect()->route('fakultet.index')->with('success', 'Fakultet je uspješno obrisan.');
    }
}
