@extends('html_layouts.main')

@section('title', 'Dashboard')

@section('content')

    <h1>Welkom, {{ auth()->user()->name }}!</h1>

@endsection
