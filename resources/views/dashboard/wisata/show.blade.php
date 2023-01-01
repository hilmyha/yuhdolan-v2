@extends('dashboard.components.dashboard-layout')

@section('container')
  <h1>Post by, {{ auth()->user()->name }}</h1>

  
  <article class="max-w-full py-6 border text-justify format format-red">
    @if ($wisata->image)
      <div class="h-[300px] overflow-hidden">
        <img class="object-cover" src="{{ asset('storage/' . $wisata->image) }}" alt="">
      </div>
      @else
      <div class="h-[300px] overflow-hidden">
        <img class="object-cover" src="http://source.unsplash.com/1920x1080?{{ $wisata->title }}" alt="">
      </div>
    @endif
    <div class="flex">
      <span class="bg-teal-100 lead text-teal-800 font-medium inline-flex items-center px-2.5 py-0.5 rounded">
        {{ $wisata->city->title }}
      </span>
    </div>
    
    <h1>{{ $wisata->title }}</h1>
    {!! $wisata->body !!}

  </article>
  

@endsection