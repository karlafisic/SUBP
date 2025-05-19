@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Uredi sobu</h1>

    <form action="{{ route('soba.update', $soba->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="broj_sobe" class="form-label">Broj sobe:</label>
            <input type="number" id="broj_sobe" name="broj_sobe" class="form-control" value="{{ $soba->broj_sobe }}" required>
        </div>

        <div class="mb-3">
            <label for="id_doma" class="form-label">Studentski dom:</label>
            <select id="id_doma" name="id_doma" class="form-control" required>
                @foreach($domovi as $dom)
                    <option value="{{ $dom->id }}" {{ $dom->id == $soba->id_doma ? 'selected' : '' }}>{{ $dom->naziv }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_tipa_sobe" class="form-label">Tip sobe:</label>
            <select id="id_tipa_sobe" name="id_tipa_sobe" class="form-control" required>
                @foreach($tipoviSoba as $tip)
                    <option value="{{ $tip->id }}" {{ $tip->id == $soba->id_tipa_sobe ? 'selected' : '' }}>{{ $tip->naziv }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Spremi promjene</button>
    </form>

    <a href="{{ route('soba.index') }}" class="btn btn-secondary">Natrag na popis soba</a>
</div>
@endsection
