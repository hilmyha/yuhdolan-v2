@extends('dashboard.components.dashboard-layout')

@section('container')
  <h1>Post by, {{ auth()->user()->name }}</h1>

  
  <article class="max-w-full py-6 border text-justify format format-red">
    <div class="flex">
      <span class="bg-teal-100 lead text-teal-800 font-medium inline-flex items-center px-2.5 py-0.5 rounded">
        {{ $wisata->city->name }}
      </span>
    </div>
    
    <h1>{{ $wisata->title }}</h1>
    {!! $wisata->body !!}

  </article>
  

@endsection