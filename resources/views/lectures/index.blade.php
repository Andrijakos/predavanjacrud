@extends('layouts.app')

@section('content')
    <h1>Predavanja</h1>
    <a href="{{ route('lectures.create') }}" class="btn btn-primary">Unesi novo predavanje</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Šifra</th>
                <th>Kratica</th>
                <th>Naziv</th>
                <th>Akcije</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->sifPred }}</td>
                    <td>{{ $lecture->kratPred }}</td>
                    <td><a href="{{ route('lectures.show', $lecture->sifPred) }}">{{ $lecture->nazPred }}</a></td>
                    <td>
                        <a href="{{ route('lectures.edit', $lecture->sifPred) }}" class="btn btn-sm btn-secondary">Izmijeni</a>
                        <form action="{{ route('lectures.destroy', $lecture->sifPred) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Izbriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $lectures->links() }}
    </div>
@endsection
