@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tipovi soba</h1>

    <a href="{{ route('tip_sobe.create') }}" class="btn btn-success mb-3">Dodaj novi tip sobe</a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Naziv</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoviSoba as $tipSobe)
                <tr>
                    <td>{{ $tipSobe->naziv }}</td>
                    <td>
                        <a href="{{ route('tip_sobe.edit', ['id' => $tipSobe->id]) }}" class="btn btn-primary btn-sm">Uredi</a>

                        <form action="{{ route('tip_sobe.destroy', $tipSobe->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Jeste li sigurni da želite obrisati ovaj tip sobe?')">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
