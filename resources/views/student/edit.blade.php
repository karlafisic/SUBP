@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Uredi studenta</h1>

    <form action="{{ route('student.update', $student->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="ime" class="form-label">Ime:</label>
            <input type="text" id="ime" name="ime" class="form-control" value="{{ old('ime', $student->ime) }}" required>
        </div>

        <div class="mb-3">
            <label for="prezime" class="form-label">Prezime:</label>
            <input type="text" id="prezime" name="prezime" class="form-control" value="{{ old('prezime', $student->prezime) }}" required>
        </div>

        <div class="mb-3">
            <label for="datum_rodenja" class="form-label">Datum rođenja:</label>
            <input type="date" id="datum_rodenja" name="datum_rodenja" class="form-control" value="{{ old('datum_rodenja', $student->datum_rodenja->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="id_fakulteta" class="form-label">Fakultet:</label>
            <select id="id_fakulteta" name="id_fakulteta" class="form-control" required>
                <option value="" disabled>Odaberi fakultet</option>
                @foreach($fakulteti as $fakultet)
                    <option value="{{ $fakultet->id }}" {{ (old('id_fakulteta', $student->id_fakulteta) == $fakultet->id) ? 'selected' : '' }}>
                        {{ $fakultet->naziv }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_sobe" class="form-label">Soba:</label>
            <select id="id_sobe" name="id_sobe" class="form-control" required>
                <option value="" disabled>Odaberi sobu</option>
                @foreach($sobe as $soba)
                    <option value="{{ $soba->id }}" {{ (old('id_sobe', $student->id_sobe) == $soba->id) ? 'selected' : '' }}>
                        Broj: {{ $soba->broj_sobe }} - {{ $soba->studentski_dom->naziv ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Spremi promjene</button>
    </form>

    <a href="{{ route('student.index') }}" class="btn btn-secondary">Natrag na popis studenata</a>
</div>
@endsection
