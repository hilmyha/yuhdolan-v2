@extends('components.layout')

@section('container')
<section class="bg-white">
  <div class=" pt-32 pb-4 px-4 container flex">
    {{-- thumbnail --}}
    <div class="overflow-hidden h-[500px] w-full">
      <img class="object-cover brightness-75" src="http://source.unsplash.com/1920x1080?{{ $wisata->title }}" alt="">
    </div>
  </div>
  <div class="pt-4 pb-24 px-4 space-y-4 container flex flex-col lg:flex-row">
    <div class="lg:max-w-[65%] max-w-[100%] text-justify format format-red">

      <article class="w-full">
        <h5>Created by <span class="text-teal-700 font-semibold">{{ $wisata->user->name }}</span> at <a class="text-teal-700 underline" href="/city/{{ $wisata->city->slug }}">{{ $wisata->city->name }}</a> | {{ $wisata->created_at->diffForHumans() }}</h5>
        
        <div class="flex">
          <span class="bg-teal-100 lead text-teal-800 font-medium text-sm inline-flex items-center px-2.5 py-0.5 rounded">
            {{ $wisata->city->name }}
          </span>
        </div>

        <h1>{{ $wisata->title }}</h1>
        {!! $wisata->body !!}

        <div class="w-full h-[350px] rounded-lg my-6" id="maps"></div>

      </article>
      
    </div>
    <div class="w-full max-w-full ml-0 lg:ml-6 text-justify format format-red">
      
      <aside class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 underline dark:text-white">Pemesanan</h5>
        
        <p class="mb-3 font-normal text-gray-500">Harga Start mulai dari</p>
        <p class="mb-3 font-bold text-2xl text-teal-500">Rp, {{ $wisata->harga }}</p>

        {{-- passing wa.me --}}
        <div class="flex text-center">
          <a href="https://wa.me/62{{ $wisata->no_pengelola }}?text=Adakah tour guide di wisata ini?" class="w-full mt-4 text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 no-underline">Informasi Kontak Tour Guide</a>
        </div>

        {{-- <button type="button" class="w-full mt-6 text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">Informasi Kontak Tour Guide</button> --}}
        
      </aside>
    
    </div>
  </div>
</section>

<script type="module">
  function showMap(lat, lng) {
    // var coords = {lat: lat, lng: lng}
    var coords = {lat: {{$wisata->latitude}}, lng: {{ $wisata->longitude }} }
    
    var map = new google.maps.Map(document.getElementById('maps'), {
      zoom: 15,
      center: coords
    })

    var marker = new google.maps.Marker({
      position: coords,
      map: map
    })
  }

  showMap(0,0)
</script>
@endsection