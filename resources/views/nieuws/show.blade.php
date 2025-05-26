<h1>{{ $nieuws->titel }}</h1>
<p>{{ $nieuws->nieuws }}</p>
@if($nieuws->foto)
    <img src="{{ asset('storage/' . $nieuws->foto) }}" width="400">
@endif
<p><small>Gepubliceerd op {{ $nieuws->verzondenOp }}</small></p>
