@extends('html_layouts.main')

@section('title', 'FAQ')

@section('content')
    <div class="FAQ_container">
        <h1>Veelgestelde vragen</h1>

<!--alleen zichtbaar voor admins-->
        @if(Auth::check() && Auth::user()->is_admin)
            <div class="FAQ_toevoegen">
                <a href="{{ route('faqs.create') }}">
                    Nieuwe FAQ toevoegen
                </a>
            </div>
        @endif


        @forelse ($categories as $category)
            <h2>{{ $category->name }}

            @if(Auth::check() && Auth::user()->is_admin)
             <a href="{{ route('faqcategories.edit', $category->id) }}" class="FAQ_categorie_link">edit categorie naam</a>
            @endif
            </h2>
            <ul class="FAQ_vragen">
                @foreach($category->faqs as $faq)
                    <li>
                        <strong>{{ $faq->question }}</strong>
                        <div class="FAQ_antwoorden">
                            <p>{{ $faq->answer }}</p>
                        </div>

                        @if(Auth::check() && Auth::user()->is_admin)
                            <div class="FAQ_acties">
                                <!-- Bewerk knop alleen zichtbaar voor admins users -->
                                <div class="FAQ_bewerk">
                                    <a href="{{ route('faqs.edit', $faq->id) }}">
                                        <button type="button">Bewerk</button>
                                    </a>
                                </div>

                                <!-- Verwijder knop alleen zichtbaar voor admins users -->
                                <div class="FAQ_verwijderen">
                                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Faq verwijderen?')">
                                            Verwijder
                                        </button>
                                    </form>
                                </div>
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
