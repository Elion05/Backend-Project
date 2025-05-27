@extends('html_layouts.main')

@section('title', 'Welkom')

@section('content')
<h2 class="nieuwsbericht_index__titel">Laatste nieuwsberichten</h2>

@if($nieuwsitems->isEmpty())
    <p class="nieuwsbericht_index__empty">Er zijn nog geen nieuwsberichten.</p>
@else
    @foreach($nieuwsitems as $nieuws)
        <article class="nieuwsbericht_index__item">
            <h3 class="nieuwsbericht_index__item-titel">{{ $nieuws->titel }}</h3>
            <p class="nieuwsbericht_index__item-datum">
                <small>Verzonden op: {{ \Carbon\Carbon::parse($nieuws->verzondenOp)->format('d-m-Y') }}</small>
            </p>
            <p class="nieuwsbericht_index__item-tekst">{{ $nieuws->nieuws }}</p>
            
            @if($nieuws->foto)
                <img class="nieuwsbericht_index__item-foto" src="{{ asset('storage/' . $nieuws->foto) }}" alt="Foto bij {{ $nieuws->titel }}">
                <br>
            @endif

            <a href="{{ route('admin.nieuws.edit', $nieuws) }}">Bewerk</a>


        </article>
    @endforeach
    
    
@endif

@endsection
