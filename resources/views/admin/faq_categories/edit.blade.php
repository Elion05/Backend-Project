@extends('html_layouts.main')

@section('title', 'Categorie bewerken')

@section('content')
    <h1 class="faq_edit_title">Categorie bewerken</h1>

    <form method="POST" action="{{ route('faqcategories.update', $faqCategory->id) }}" class="faq_edit_form">
        @csrf
        @method('PUT')

        <div class="faq_edit_group">
            <label for="name" class="faq_edit_label">Naam categorie</label>
            <input type="text" name="name" id="name" value="{{ old('name', $faqCategory->name) }}" class="faq_edit_input" required>
        </div>

        <button type="submit" class="faq_edit_button">Bijwerken</button>
    </form>
@endsection
