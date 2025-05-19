@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Sobe</h1>

    <a href="{{ route('soba.create') }}" class="btn btn-success mb-3">Dodaj novu sobu</a>
    <a href="{{ route('tip_sobe.create') }}" class="btn btn-success mb-3">Dodaj novi tip sobe</a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Broj sobe</th>
                <th>Studentski dom</th>
                <th>Tip sobe</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sobe as $soba)
                <tr>
                    <td>{{ $soba->broj_sobe }}</td>
                    <td>{{ $soba->studentski_dom->naziv ?? 'N/A' }}</td>
                    <td>{{ $soba->tip_sobe->naziv ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('soba.edit', $soba->id) }}" class="btn btn-primary btn-sm">Uredi</a>

                        <form action="{{ route('soba.destroy', $soba->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Jeste li sigurni da želite obrisati ovu sobu?')">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
