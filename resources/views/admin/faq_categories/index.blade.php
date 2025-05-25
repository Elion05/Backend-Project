@extends('html_layouts.main')

@section('title', 'Categorieën overzicht')

@section('content')
    <h1>Categorieën</h1>

    @if(session('succes'))
        <p style="color: green;">{{ session('succes') }}</p>
    @endif

    <a href="{{ route('faqcategories.create') }}">+ Nieuwe categorie toevoegen</a>

    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}

                <a href="{{ route('faqcategories.edit', $category->id) }}">Bewerk</a>

                <form action="{{ route('faqcategories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Zeker weten?')">Verwijder</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
