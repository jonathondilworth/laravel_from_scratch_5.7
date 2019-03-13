@extends('layout')

@section('content')

  <h1>Here we go!</h1>

  <ul>

    @foreach($tasks as $task)

      <li>{{ $task }}</li>

    @endforeach

  </ul>

@endsection('content')