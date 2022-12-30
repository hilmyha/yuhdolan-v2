@extends('dashboard.components.dashboard-layout')

@section('container')
  <h1>Post by, {{ auth()->user()->name }}</h1>

  
  <article class="max-w-full py-6 border text-justify format format-red">
    
    <h1>{{ $blog->title }}</h1>
    {!! $blog->body !!}

  </article>
  

@endsection