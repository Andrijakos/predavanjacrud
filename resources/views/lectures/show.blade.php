@extends('layouts.app')

@section('content')
    <h1>Predavanje {{ $lecture->nazPred }}</h1>

    <dl>
        <dt>Šifra</dt>
        <dd>{{ $lecture->sifPred }}</dd>
        <dt>Kratica</dt>
        <dd>{{ $lecture->kratPred }}</dd>
        <dt>Naziv</dt>
        <dd>{{ $lecture->nazPred }}</dd>
        <dt>Šifra organizacijske jedinice</dt>
        <dd>{{ $lecture->sifOrgjed }}</dd>
        <dt>Upisano studenata</dt>
        <dd>{{ $lecture->upisanoStud }}</dd>
        <dt>Broj sati tjedno</dt>
        <dd>{{ $lecture->brojSatiTjedno }}</dd>
    </dl>
@endsection
