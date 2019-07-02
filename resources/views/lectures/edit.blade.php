@extends('layouts.app')

@section('content')
    <h1>Izmijeni predavanje</h1>

    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lectures.update', $lecture->sifPred) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="sifPred">Šifra</label>
            <input type="text" name="sifPred" id="sifPred" class="form-control" value="{{ old('sifPred') ? old('sifPred') : $lecture->sifPred }}">
        </div>

        <div class="form-group">
            <label for="kratPred">Kratica</label>
            <input type="text" name="kratPred" id="kratPred" class="form-control" value="{{ old('kratPred') ? old('kratPred') : $lecture->kratPred }}">
        </div>

        <div class="form-group">
            <label for="nazPred">Naziv</label>
            <input type="text" name="nazPred" id="nazPred" class="form-control" value="{{ old('nazPred') ? old('nazPred') : $lecture->nazPred }}">
        </div>

        <div class="form-group">
            <label for="sifOrgjed">Organizacijska jedinica</label>
            <input type="text" name="sifOrgjed" id="sifOrgjed" class="form-control" value="{{ old('sifOrgjed') ? old('sifOrgjed') : $lecture->sifOrgjed }}">
        </div>

        <div class="form-group">
            <label for="upisanoStud">Upisano studenata</label>
            <input type="number" name="upisanoStud" id="upisanoStud" class="form-control" value="{{ old('upisanoStud') ? old('upisanoStud') : $lecture->upisanoStud }}">
        </div>

        <div class="form-group">
            <label for="brojSatiTjedno">Broj sati tjedno</label>
            <input type="text" name="brojSatiTjedno" id="brojSatiTjedno" class="form-control" value="{{ old('brojSatiTjedno') ? old('brojSatiTjedno') : $lecture->upisanoStud }}">
        </div>

        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
