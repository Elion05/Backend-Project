@extends('html_layouts.main')

@section('title', 'berichten')

@section('content')
    <h2>berichten</h2>

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
    border:2px solid gray;
    padding:4px;
}
h2{
    justify-self:center;
    border-bottom:4px solid green;
}
</style>
