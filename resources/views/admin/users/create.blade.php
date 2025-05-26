@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/simple-form.css') }}">
@endsection

@section('content')
<!--simpele css voor de formulier, ik moet dit nog aanpassen-->
<style>
    
</style>
<div class="container">
    <h1>Nieuwe Gebruiker Aanmaken</h1>
    
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="formulier">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="formulier">
            <label for="username">Gebruikersnaam</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="formulier">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="formulier">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Aanmaken</button>
    </form>
</div>
@endsection
