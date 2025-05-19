@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Studentski domovi</h1>

    <a href="{{ route('studentski_dom.create') }}" class="btn btn-success mb-3">Dodaj novi dom</a>
    <a href="{{ route('soba.create') }}" class="btn btn-success mb-3">Dodaj novu sobu</a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Naziv</th>
                <th>Adresa</th>
                <th>Kapacitet</th>
                <th>Kapacitet menze</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($domovi as $dom)
                <tr>
                    <td>{{ $dom->naziv }}</td>
                    <td>{{ $dom->adresa }}</td>
                    <td>{{ $dom->kapacitet }}</td>
                    <td>{{ $dom->kapacitet_menze }}</td>
                    <td>
                        <a href="{{ route('studentski_dom.edit', $dom->id) }}" class="btn btn-primary btn-sm">Uredi</a>

                        <form action="{{ route('studentski_dom.destroy', $dom->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Jeste li sigurni da želite obrisati ovaj dom?')">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
