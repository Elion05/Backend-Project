@extends('html_layouts.main')

@section('title', 'berichten')

@section('content')
    <h2>Berichten</h2>

    @forelse($berichten as $bericht)
        <div class="contact_personen">
            <strong>Naam:</strong> {{ $bericht->naam }} <br>
            <strong>Email:</strong> {{ $bericht->email }} <br>
            <strong>Bericht:</strong> <p>{{ $bericht->bericht }}</p>
            
        </div>
    @empty
        <p>Geen berichten gevonden.</p>
    @endforelse
@endsection

<style>

.contact_personen{
    justify-self:center;
    width: 800px;
    border:5px solid black;
    padding:4px;
    background-color:gray;
    color:yellow;
}
h2{
    justify-self:center;
    border-bottom:4px solid black;
    color:yellow;
    background-color:gray;
    padding:5px;
    border-radius:5px;
}
</style>
