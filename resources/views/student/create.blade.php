@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dodaj novog studenta</h1>

    <form action="{{ route('student.store') }}" method="POST" class="mb-3">
        @csrf

        <div class="mb-3">
            <label for="ime" class="form-label">Ime:</label>
            <input type="text" id="ime" name="ime" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prezime" class="form-label">Prezime:</label>
            <input type="text" id="prezime" name="prezime" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="datum_rodenja" class="form-label">Datum rođenja:</label>
            <input type="date" id="datum_rodenja" name="datum_rodenja" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_fakulteta" class="form-label">Fakultet:</label>
            <select id="id_fakulteta" name="id_fakulteta" class="form-control" required>
                <option value="" disabled selected>Odaberi fakultet</option>
                @foreach($fakulteti as $fakultet)
                    <option value="{{ $fakultet->id }}">{{ $fakultet->naziv }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_sobe" class="form-label">Soba:</label>
            <select id="id_sobe" name="id_sobe" class="form-control" required>
                <option value="" disabled selected>Odaberi sobu</option>
                @foreach($sobe as $soba)
                    <option value="{{ $soba->id }}">Broj: {{ $soba->broj_sobe }} - {{ $soba->studentski_dom->naziv ?? 'N/A' }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj studenta</button>
    </form>

    <a href="{{ route('student.index') }}" class="btn btn-secondary">Natrag na popis studenata</a>
</div>
@endsection
