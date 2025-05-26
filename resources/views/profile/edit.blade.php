@extends('html_layouts.main')
@section('content')
    <h1>Profiel bewerken</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('status'))
        <div style="color: green;">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" autocomplete="name">
        </div>

        <div>
    <label for="email">E-mailadres</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" autocomplete="email" required>
</div>


        <div>
            <label for="username">Gebruikersnaam</label>
            <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" autocomplete="username">
        </div>

        <div>
            <label for="birthday">Verjaardag</label>
            <input type="date" name="birthday" id="birthday" value="{{ old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : '') }}" autocomplete="bday">
        </div>

        <div>
            <label for="bio">Over mij</label>
            <textarea name="bio" id="bio" autocomplete="off">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div>
            <label for="profile_image">Profielfoto</label>
            <input type="file" name="profile_image" id="profile_image" autocomplete="off">
        </div>

        


        <button type="submit">Opslaan</button>
    </form>
@endsection

