@extends('components.layout')

@section('container')
<section class="bg-white">
  <div class="pt-48 pb-24 px-4 container border">
    
    <div class="pb-10">
      <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-700">{{ $title }}</h2>
      <p class="font-light text-gray-500 sm:text-xl">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
    </div>
  
    <div class="grid gap-8 xl:grid-cols-3 lg:grid-cols-2">     
      @foreach ($wisatas as $wisata)
        <article class="card group hover:bg-primary-400">
          <div class="p-5">
            <div class="img-card">
              <img class="rounded-lg" src="http://source.unsplash.com/1920x1080?{{ $wisata->title }}" alt="" />
            </div>
            <div class="flex justify-between items-center mb-5 text-gray-500 group-hover:text-white">
              <span class="bg-primary-50 text-primary-500 group-hover:bg-slate-50 group-hover:text-slate-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                  {{ $wisata->city->title }}
              </span>
              <span class="text-sm group-hover:text-white">{{ $wisata->created_at->diffForHumans() }}</span>
            </div>
            <a href="/top-destination/{{ $wisata->slug }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-700 group-hover:text-white hover:underline">{{ $wisata->title }}</h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 group-hover:text-white">{{ $wisata->excerpt }}</p>
          </div>
        </article>
      @endforeach 
    </div>
    <div class="pt-6">
      {{ $wisatas->links() }}
    </div>
    
  
  </div>
</section>
@endsection