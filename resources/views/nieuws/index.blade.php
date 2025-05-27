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
                <p style="font-size:14px; border-bottom:2px solid black;">Verzonden op: {{ \Carbon\Carbon::parse($nieuws->verzondenOp)->format('d-m-Y') }}</p>
            </p>
            <p class="nieuwsbericht_index__item-tekst">{{ $nieuws->nieuws }}</p>
            
            @if($nieuws->foto)
                <img class="nieuwsbericht_index__item-foto" src="{{ asset('storage/' . $nieuws->foto) }}" alt="Foto bij {{ $nieuws->titel }}">
                <br>
            @endif

            @if(Auth::check() && Auth::user()->is_admin)
            <a href="{{ route('admin.nieuws.edit', $nieuws) }}">Bewerk</a>
            @endif

            @if(Auth::check() && Auth::user()->is_admin)
            <form action="{{ route('admin.nieuws.destroy', $nieuws) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('nieuws verwijderen?')" style="background-color:gray; color:white;" >Verwijder nieuws</button>
            </form>
            @endif

        </article>
    @endforeach
    
    
@endif

@endsection
