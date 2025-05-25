@extends('html_layouts.main')

@section('title', 'FAQ bewerken')

@section('content')
    <h1>FAQ bewerken</h1>

    <form method="POST" action="{{ route('faqs.update', $faq->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="question">Vraag</label>
            <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" required>
        </div>

        <div>
            <label for="answer">Antwoord</label>
            <textarea name="answer" id="answer" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div>
            <label for="faq_category_id">Categorie</label>
            <select name="faq_category_id" id="faq_category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected($faq->faq_category_id == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Opslaan</button>
    </form>
@endsection
