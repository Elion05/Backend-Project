<!---voorlopig nog niks-->
@extends('html_layouts.main')

@section('title', 'Nieuwsbericht bewerken')

@section('content')
    <h2>Nieuwsbericht bewerken</h2>

    <form method="POST" action="{{ route('admin.nieuws.update', $nieuws) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label for="titel">Titel</label>
        <input type="text" name="titel" value="{{ old('titel', $nieuws->titel) }}" required>

        <label for="nieuws">Nieuwsbericht</label>
        <textarea name="nieuws" required>{{ old('nieuws', $nieuws->nieuws) }}</textarea>

        <label for="verzondenOp">Verzonden op</label>
        <input type="date" name="verzondenOp" value="{{ old('verzondenOp', $nieuws->verzondenOp->format('Y-m-d')) }}" required>

        <label for="foto">Foto</label>
        @if($nieuws->foto)
            <p>Huidige foto:</p>
            <img src="{{ asset('storage/' . $nieuws->foto) }}" width="150">
        @endif
        <input type="file" name="foto">

        <button type="submit">Bijwerken</button>
    </form>
@endsection
