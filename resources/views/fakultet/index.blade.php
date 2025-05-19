@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Fakulteti</h1>

    <a href="{{ route('fakultet.create') }}" class="btn btn-success mb-3">Dodaj novi fakultet</a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Naziv fakulteta</th>
                <th>Adresa</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakulteti as $fakultet)
                <tr>
                    <td>{{ $fakultet->naziv }}</td>
                    <td>{{ $fakultet->adresa }}</td>
                    <td>
                        <a href="{{ route('fakultet.edit', $fakultet->id) }}" class="btn btn-primary btn-sm">Uredi</a>

                        <form action="{{ route('fakultet.destroy', $fakultet->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Jeste li sigurni da želite obrisati ovaj fakultet?')">
                                Obriši
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($fakulteti->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">Nema dodanih fakulteta.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
