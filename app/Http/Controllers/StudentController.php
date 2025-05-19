<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fakultet;
use App\Models\Soba;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $studenti = Student::with(['fakultet', 'soba'])->get();
        return view('student.index', compact('studenti'));
    }

    public function create()
    {
        $fakulteti = Fakultet::all();
        $sobe = Soba::all();
        return view('student.create', compact('fakulteti', 'sobe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'datum_rodenja' => 'required|date',
            'id_fakulteta' => 'required|exists:fakultet,id',
            'id_sobe' => 'required|exists:soba,id',
        ]);

        Student::create($request->all());

        return redirect()->route('student.index')->with('success', 'Student je uspješno dodan.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $fakulteti = Fakultet::all();
        $sobe = Soba::all();
        return view('student.edit', compact('student', 'fakulteti', 'sobe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'datum_rodenja' => 'required|date',
            'id_fakulteta' => 'required|exists:fakultet,id',
            'id_sobe' => 'required|exists:soba,id',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('student.index')->with('success', 'Podaci studenta su uspješno ažurirani.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student je uspješno obrisan.');
    }
}
