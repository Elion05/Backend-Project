@extends('html_layouts.main')

@section('title', 'Nieuwe FAQ toevoegen')

@section('content')
    <h1>Nieuwe  FAQ toevoegen</h1>

    <style>

        

    </style>
    <form method="POST" action="{{ route('faqs.store') }}">
        @csrf

        <div>
            <label for="faq_category_id">Categorie</label>
            <select name="faq_category_id" id="faq_category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <div>
            <label for="question">Vraag</label>
            <input type="text" name="question" id="question" required>
        </div>

        <div>
            <label for="answer">Antwoord</label>
            <textarea name="answer" id="answer" rows="4" required></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
