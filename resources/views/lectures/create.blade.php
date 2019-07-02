@extends('layouts.app')

@section('content')
    <h1>Novo predavanje</h1>

    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lectures.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="sifPred">Šifra</label>
            <input type="text" name="sifPred" id="sifPred" class="form-control" value="{{ old('sifPred') }}">
        </div>

        <div class="form-group">
            <label for="kratPred">Kratica</label>
            <input type="text" name="kratPred" id="kratPred" class="form-control" value="{{ old('kratPred') }}">
        </div>

        <div class="form-group">
            <label for="nazPred">Naziv</label>
            <input type="text" name="nazPred" id="nazPred" class="form-control" value="{{ old('nazPred') }}">
        </div>

        <div class="form-group">
            <label for="sifOrgjed">Organizacijska jedinica</label>
            <input type="text" name="sifOrgjed" id="sifOrgjed" class="form-control" value="{{ old('sifOrgjed') }}">
        </div>

        <div class="form-group">
            <label for="upisanoStud">Upisano studenata</label>
            <input type="number" name="upisanoStud" id="upisanoStud" class="form-control" value="{{ old('upisanoStud') }}">
        </div>

        <div class="form-group">
            <label for="brojSatiTjedno">Broj sati tjedno</label>
            <input type="text" name="brojSatiTjedno" id="brojSatiTjedno" class="form-control" value="{{ old('brojSatiTjedno') }}">
        </div>

        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
