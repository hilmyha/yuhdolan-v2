@extends('components.layout')

@section('container')
<section class="bg-white h-screen">
  <div class=" pt-32 pb-4 px-4 container flex">
    {{-- thumbnail --}}
    <div class="overflow-hidden h-[500px] w-full">
      <img class="object-cover brightness-75" src="http://source.unsplash.com/1920x1080?{{ $blog->name }}" alt="">
    </div>
  </div>
  <div class="pt-4 pb-24 px-4 container flex border">
    <article class="max-w-full text-justify format format-red border">

      <h5 class="mb-4">author <span class="text-teal-700 underline">{{ $blog->user->name }}</span> created {{ $blog->created_at->diffForHumans() }}</h5>
      <h1>{{ $blog->title }}</h1>
      {!! $blog->body !!}

    </article>
    
      
    
  
  </div>
</section>
@endsection