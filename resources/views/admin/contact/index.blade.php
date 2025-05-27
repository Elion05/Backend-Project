@extends('html_layouts.main')

@section('title', 'berichten')

@section('content')
    <h2>berichten</h2>

    @forelse($berichten as $bericht)
        <div>
            <strong>Naam:</strong> {{ $bericht->naam }} <br>
            <strong>Email:</strong> {{ $bericht->email }} <br>
            <strong>Bericht:</strong> <p>{{ $bericht->bericht }}</p>
            <hr>
        </div>
    @empty
        <p>Geen berichten gevonden.</p>
    @endforelse
@endsection
