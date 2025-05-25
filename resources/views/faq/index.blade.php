@extends('html_layouts.main')

@section('title', 'FAQ')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Veelgestelde vragen</h1>

        @forelse ($categories as $category)
            <h2 class="text-lg font-semibold mt-6 mb-2">{{ $category->name }}</h2>
            <ul class="list-disc list-inside text-gray-800">
                @foreach($category->faqs as $faq)
                    <li class="mb-3">
                        <strong>{{ $faq->question }}</strong><br>
                        <p>{{ $faq->answer }}</p>
                    </li>
                @endforeach
            </ul>
        @empty
            <p>Er zijn nog geen veelgestelde vragen beschikbaar.</p>
        @endforelse
    </div>
@endsection
