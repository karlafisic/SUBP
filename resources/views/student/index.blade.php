@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Studenti</h1>

    <a href="{{ route('student.create') }}" class="btn btn-success mb-3">Dodaj novog studenta</a>
    <a href="{{ route('fakultet.create') }}" class="btn btn-success mb-3">Dodaj novi fakultet</a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Datum rođenja</th>
                <th>Fakultet</th>
                <th>Soba</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studenti as $student)
                <tr>
                    <td>{{ $student->ime }}</td>
                    <td>{{ $student->prezime }}</td>
                    <td>{{ $student->datum_rodenja->format('d.m.Y') }}</td>
                    <td>{{ $student->fakultet->naziv ?? 'N/A' }}</td>
                    <td>Broj: {{ $student->soba->broj_sobe ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary btn-sm">Uredi</a>

                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Jeste li sigurni da želite obrisati ovog studenta?')">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
