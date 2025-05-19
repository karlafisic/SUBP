@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dodaj novi tip sobe</h1>

    <form action="{{ route('tip_sobe.store') }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv tipa sobe:</label>
            <input type="text" id="naziv" name="naziv" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj tip sobe</button>
    </form>

    <a href="{{ route('tip_sobe.index') }}" class="btn btn-secondary">Natrag na popis tipova soba</a>
</div>
@endsection
