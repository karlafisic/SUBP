@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Uredi fakultet</h1>

    <form action="{{ route('fakultet.update', $fakultet->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv fakulteta:</label>
            <input type="text" id="naziv" name="naziv" class="form-control" value="{{ $fakultet->naziv }}" required>
        </div>

        <div class="mb-3">
            <label for="adresa" class="form-label">Adresa:</label>
            <input type="text" id="adresa" name="adresa" class="form-control" value="{{ $fakultet->adresa }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Spremi promjene</button>
    </form>

    <a href="{{ route('fakultet.index') }}" class="btn btn-secondary">Natrag na popis fakulteta</a>
</div>
@endsection
