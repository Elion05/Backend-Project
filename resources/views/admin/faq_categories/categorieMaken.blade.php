@extends('html_layouts.main')

@section('title', 'Nieuwe categorie')

@section('content')
    <h1>Nieuwe categorie toevoegen</h1>

    <form method="POST" action="{{ route('faqcategories.store') }}">
        @csrf
        <div>
            <label for="name">Naam van de categorie</label>
            <input type="text" name="name" id="name" required>
        </div>

        <button type="submit">Opslaan</button>
    </form>
@endsection
