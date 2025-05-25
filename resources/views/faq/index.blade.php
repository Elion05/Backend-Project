@extends('html_layouts.main')

@section('title', 'FAQ')

@section('content')
    <div>
        <h1>Veelgestelde vragen</h1>

        <!-- Alleen voor admins te -->
        @if(Auth::check() && Auth::user()->is_admin)
            <div>
                <a href="{{ route('faqs.create') }}">
                    Nieuwe FAQ toevoegen
                </a>
            </div>
        @endif

        <!-- FAQ-categorieën en vragen -->
        @forelse ($categories as $category)
            <h2>{{ $category->name }}</h2>
            <ul>
                @foreach($category->faqs as $faq)
                    <li style="margin-bottom: 15px;">
                        <strong>{{ $faq->question }}</strong><br>
                        <p>{{ $faq->answer }}</p>

                        @if(Auth::check() && Auth::user()->is_admin)
                            <div>
                                <!-- Bewerk knop -->
                                <a href="{{ route('faqs.edit', $faq->id) }}">
                                    <button type="button">Bewerk</button>
                                </a>

                                <!-- Verwijder knop -->
                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Faq verwijderen?')">
                                        Verwijder
                                    </button>
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        @empty
            <p>Er zijn nog geen veelgestelde vragen beschikbaar.</p>
        @endforelse
    </div>
@endsection
