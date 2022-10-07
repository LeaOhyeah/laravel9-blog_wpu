@extends('layouts.main')
@section('container')
    <h1>about page</h1>
    <h3>{{ $name }}</h3>
    <p> {{ $email }} </p>
    <img src="{{ $image }}" alt="{{ $image }}" width="200" class="img-thumbnail rounded-circle">
@endsection
