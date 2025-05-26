@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="titel">Gebruikersbeheer</h1>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div style="text-align: right; margin-bottom: 1rem;">
            <a href="{{ route('admin.users.create') }}" class="button">
                Nieuwe gebruiker
            </a>
        </div>

        @foreach ($users as $user)
            <div class="gebruikers">
                <div>
                    <strong>Name: {{ $user->name }}</strong> <br>Username: {{$user->username}}<br>
                    Email: {{$user->email}} <br>
                    
                    Admin rechten: <span><strong>{{ $user->is_admin ? 'Ja' : 'Nee' }}</strong></span>
                </div>

                @if(auth()->id() !== $user->id)
                    <form method="POST" action="{{ route('admin.users.verhefAdmin', $user) }}">
                        @csrf
                        @method('PATCH')
                        <button class="button" type="submit">
                            {{ $user->is_admin ? 'Adminrechten afnemen' : 'Maak admin' }}
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
