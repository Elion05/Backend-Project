@extends('html_layouts.main')

@section('title', 'Welkom')

@section('content')

<h1>Welkom to Destiny help page</h1>

<a href="{{ route('nieuws.create') }}">Nieuw nieuwsbericht aanmaken</a>

<hr>

<h2>Laatste nieuwsberichten</h2>

@if($nieuwsitems->isEmpty())
    <p>Er zijn nog geen nieuwsberichten.</p>
@else
    @foreach($nieuwsitems as $nieuws)
        <article style="margin-bottom: 2rem;">
            <h3>{{ $nieuws->titel }}</h3>
            <p><small>Verzonden op: {{ \Carbon\Carbon::parse($nieuws->verzondenOp)->format('d-m-Y') }}</small></p>
            <p>{{ $nieuws->nieuws }}</p>
<!-- @if($nieuws->foto)
                <img src="{{ asset('storage/' . $nieuws->foto) }}" alt="Foto bij {{ $nieuws->titel }}" style="max-width: 300px;">
 @endif-->
            
        </article>
    @endforeach
@endif

@endsection
