@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/simple-form.css') }}">
@endsection

@section('content')
<!--simpele css voor de formulier, ik moet dit nog aanpassen-->
<style>
    .container {
    max-width: 600px;
    margin: 10px auto;
  }
  
  h1 {
    font-size: 24px;
    margin-bottom: 16px;
  }
  
  label {
    display: block;
    margin-bottom: 4px;
  }
  
  input[type="password"] {
    width: 100%;
    padding: 8px;    
  }

  input[type="email"]{
    width: 100%;
    padding: 8px;
  }
  
  input[type="text"]{
    width: 100%;
    padding: 8px;
  }

  input[type="checkbox"] {
    margin-right: 6px;
  }
  
  button {
    background:rgb(6, 93, 186);
    color: #fff;
    padding: 10px 16px;
    border-radius: 4px;
  }
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

        <div class="formulier">
            <label>
                <input type="checkbox" name="is_admin">
                Admin rechten geven?
            </label>
        </div>

        <button type="submit">Aanmaken</button>
    </form>
</div>
@endsection
