@extends('html_layouts.main')

@section('title', $user->username . ' - Profiel')

@section('content')
<h1 class="profiel_titel">Profiel</h1>
    <div class="profiel_container">
    <p class="profiel_info">Username: {{ $user->username }}</p>
    <p class="profiel_info">Naam:{{ $user->name }}</p>
    <p class="profiel_info">Email: {{$user->email}}</p>
    <p class="profiel_info">Verjaardag: {{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') : 'Niet opgegeven' }}</p>
    <p class="profiel_info">Over mij: {{ $user->bio ?? 'Geen info' }}</p>
    

    @if ($user->profile_image)
        <img class="profiel_foto" src="{{ asset('storage/' . $user->profile_image) }}" alt="Profielfoto">
    @else
        <p class="profiel_info">Geen profielfoto.</p>
    @endif

    @auth
        @if (auth()->user()->id === $user->id)
            <div>
                <a class="profiel_edit_link" href="{{ route('profile.edit') }}">Profiel bewerken</a>
            </div>
        @endif
    @endauth
</div>
@endsection
