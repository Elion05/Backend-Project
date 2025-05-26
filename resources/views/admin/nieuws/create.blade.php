@extends('html_layouts.main')

@section('title', 'Nieuwsitem aanmaken')
<!--Ik heb chatgpt gebruikt om de classes namen toe te voegen
maar het heeft dezelfde structuur als de FAQ toevoegen
-->
@section('content')
    <h1 class="create_nieuws-title">Nieuwsitem aanmaken</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="create_nieuws-form" action="{{ route('nieuws.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="create_nieuws-label" for="titel">Titel</label>
        <input class="create_nieuws-input" type="text" name="titel" id="titel" value="{{ old('titel') }}" required>

        <label class="create_nieuws-label" for="nieuws">Inhoud</label>
        <textarea class="create_nieuws-textarea" name="nieuws" id="nieuws" rows="5" required>{{ old('nieuws') }}</textarea>

        <label class="create_nieuws-label" for="verzondenOp">Publicatiedatum</label>
        <input class="create_nieuws-input" type="date" name="verzondenOp" id="verzondenOp" value="{{ old('verzondenOp') }}" required>

        <label class="create_nieuws-label" for="foto">Afbeelding (optioneel)</label>
        <input class="create_nieuws-input" type="file" name="foto" id="foto">

        <button class="create_nieuws-submit-btn" type="submit">Opslaan</button>
    </form>
@endsection
