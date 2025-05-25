@extends('layouts.app')

@section('title', $user->username . ' - Profiel')

@section('content')
    <div>
        <h1><strong>Username:</strong> {{ $user->username }}</h1>
        <p><strong>Naam:</strong> {{ $user->name }}</p>
        <p><strong>Verjaardag:</strong> {{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') : 'Niet opgegeven' }}</p>
        <p><strong>Over mij:</strong> {{ $user->bio ?? 'Geen info' }}</p>

        @if ($user->profile_image)
            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profielfoto" style="max-width: 200px;">
        @else
            <p>Geen profielfoto.</p>
        @endif
    </div>
@endsection
