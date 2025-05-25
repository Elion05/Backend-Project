@extends('html_layouts.main')

@section('title', 'Categorie bewerken')

@section('content')
    <h1>Categorie bewerken</h1>

    
    <form method="POST" action="{{ route('faqcategories.update', $faqCategory->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" value="{{ old('name', $faqCategory->name) }}" required>
        </div>

        <button type="submit">Opslaan</button>
    </form>
@endsection
