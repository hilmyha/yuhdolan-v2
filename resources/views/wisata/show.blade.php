@extends('components.layout')

@section('container')
<section class="bg-white">
  <div class=" pt-32 pb-4 px-4 container flex border">
    {{-- thumbnail --}}
    <div class="overflow-hidden h-[500px] w-full">
      <img class="object-cover brightness-75" src="http://source.unsplash.com/1920x1080?{{ $wisata->title }}" alt="">
    </div>
  </div>
  <div class="pt-4 pb-24 px-4 container flex border">
    <div class="max-w-[65%] text-justify format format-red border">

      <article class="w-full">
        <div class="flex">
          <span class="bg-teal-100 lead text-teal-800 font-medium inline-flex items-center px-2.5 py-0.5 rounded">
            {{ $wisata->city->name }}
          </span>
        </div>

        <h5>author <span class="text-teal-700 underline">{{ $wisata->user->name }}</span> created {{ $wisata->created_at->diffForHumans() }}</h5>
        <h1>{{ $wisata->title }}</h1>
        {!! $wisata->body !!}

      </article>
      
    </div>
    <div class="w-full ml-4 text-justify format format-red border">
      
      <aside class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 underline dark:text-white">Pemesanan</h5>
        
        <p class="mb-3 font-normal text-gray-500">Harga Start mulai dari</p>
        <p class="mb-3 font-bold text-2xl text-teal-500">Rp. </p>
        <button type="button" class=" w-full mt-6 text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">Informasi Kontak Tour Guide</button>
        
      </aside>
    
    </div>
    
      
    
  
  </div>
</section>
@endsection