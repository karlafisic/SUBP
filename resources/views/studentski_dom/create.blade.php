@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dodaj novi studentski dom</h1>

    <form action="{{ route('studentski_dom.store') }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv doma:</label>
            <input type="text" id="naziv" name="naziv" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="adresa" class="form-label">Adresa:</label>
            <input type="text" id="adresa" name="adresa" class="form-control">
        </div>

        <div class="mb-3">
            <label for="kapacitet" class="form-label">Kapacitet smještaja:</label>
            <input type="number" id="kapacitet" name="kapacitet" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kapacitet_menze" class="form-label">Kapacitet menze:</label>
            <input type="number" id="kapacitet_menze" name="kapacitet_menze" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj dom</button>
    </form>

    <a href="{{ route('studentski_dom.index') }}" class="btn btn-secondary">Natrag na popis domova</a>
</div>
@endsection
