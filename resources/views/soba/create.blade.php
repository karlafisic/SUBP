@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dodaj novu sobu</h1>

    <form action="{{ route('soba.store') }}" method="POST" class="mb-3">
        @csrf

        <div class="mb-3">
            <label for="broj_sobe" class="form-label">Broj sobe:</label>
            <input type="number" id="broj_sobe" name="broj_sobe" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_doma" class="form-label">Studentski dom:</label>
            <select id="id_doma" name="id_doma" class="form-control" required>
                <option value="" disabled selected>Odaberi dom</option>
                @foreach($domovi as $dom)
                    <option value="{{ $dom->id }}">{{ $dom->naziv }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_tipa_sobe" class="form-label">Tip sobe:</label>
            <select id="id_tipa_sobe" name="id_tipa_sobe" class="form-control" required>
                <option value="" disabled selected>Odaberi tip sobe</option>
                @foreach($tipoviSoba as $tip)
                    <option value="{{ $tip->id }}">{{ $tip->naziv }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj sobu</button>
    </form>

    <a href="{{ route('soba.index') }}" class="btn btn-secondary">Natrag na popis soba</a>
</div>
@endsection
