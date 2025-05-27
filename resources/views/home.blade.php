@extends('html_layouts.main')

@section('title', 'Welkom')

@section('content')



<h1>Welkom 

@if(auth()->check())
{{auth()->user()->name}}
@else
bezoeker
@endif
bij mijn website!!
</h1>

@include('html_layouts.leaderboard')

<br><br><br><br><br><br><hr>
<h3 class="contacteer_h3">Contacteer ons hier:</h3>


@if(session('succes'))
    <div style="color: green;">
        {{ session('succes') }}
    </div>
@endif

@if(auth()->check())
<form action="{{ route('contact.store') }}" method="POST">
    @csrf

 
<div class="contact_div_bericht">
    <label class="label_contact"l>Bericht:</label>
    <textarea  class="bericht_contact" name="bericht" required></textarea><br>

    <button class="bericht_contact_button" type="submit">Verstuur</button>
    </div>
</form>
@else
<p>Je moet je inloggen met een geldige account om berichten te verzenden</p>
@endif


@endsection
