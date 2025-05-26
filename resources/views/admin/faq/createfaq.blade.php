@extends('html_layouts.main')

@section('title', 'Nieuwe FAQ toevoegen')

@section('content')
    <h1 class="h1_faq_create">Nieuwe FAQ toevoegen</h1>

    <form method="POST" action="{{ route('faqs.store') }}" class="faq-create-form">
        @csrf

        <div>
            <label for="faq_category_id" class="faq-label">Categorie</label>
            <select name="faq_category_id" id="faq_category_id" class="faq-input">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="question" class="faq-label">Vraag</label>
            <input type="text" name="question" id="question" class="faq-input" required>
        </div>

        <div>
            <label for="answer" class="faq-label">Antwoord</label>
            <textarea name="answer" id="answer" rows="4" class="faq-input" required></textarea>
        </div>

        <button type="submit" class="faq-submit-btn">Toevoegen</button>
    </form>
@endsection
