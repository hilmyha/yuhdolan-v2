  @extends('dashboard.components.dashboard-layout')

@section('container')
  
<div class="max-w-full grid format gap-12 bg-white sm:py-4 xl:py-6 ">
  <h1>Edit Post</h1>

  <div class="mt-5 md:col-span-2 md:mt-0">
    <form action="/dashboard/wisata/{{ $wisata->id }}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf
        <div class="space-y-6 bg-white py-2 sm:p-6">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="title" id="title" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('title', $wisata->title) }}">
            </div>
          </div>

          <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="slug" id="slug" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('slug', $wisata->slug) }}">
            </div>
          </div>

          <div>
            <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="excerpt" id="excerpt" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('excerpt', $wisata->excerpt) }}">
            </div>
          </div>
          
          <div>
            <label for="no_pengelola" class="block text-sm font-medium text-gray-700">No Pengelola</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                +62
              </span>
              <input type="tel" name="no_pengelola" id="no_pengelola" class="block w-full flex-1 rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('no_pengelola', $wisata->no_pengelola) }}">
            </div>
          </div>

          <div>
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="harga" id="harga" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('harga', $wisata->harga) }}">
            </div>
          </div>

          <div>
            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="latitude" id="latitude" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('latitude', $wisata->latitude) }}">
            </div>
          </div>

          <div>
            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="longitude" id="longitude" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('longitude', $wisata->longitude) }}">
            </div>
          </div>

          <div>
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">Select your city</label>
            <select id="city" name="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              @foreach ($cities as $city)
                @if (old('city_id', $wisata->city_id) == $city->id)
                  <option value="{{ $city->id }}" selected>{{ $city->title }}</option>
                @else
                  <option value="{{ $city->id }}">{{ $city->title }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="overflow-hidden">
            @if ($wisata->image)
              <img class="preview-img w-[500px] object-cover" src="{{ asset('storage/' . $wisata->image) }}" alt="">
            @else
              <img class="preview-img w-[500px] object-cover" src="" alt="">
            @endif
          </div>
          
          <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Upload file</label>
          <input type="hidden" name="oldImage" value="{{ $wisata->image }}">
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" id="image" name="image" type="file" onchange="previewImage()">

          <div>
            <label for="body" class="block mb-2 text-sm font-medium text-gray-700">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $wisata->body) }}">
            <trix-editor input="body"></trix-editor>
          </div>

          <div>
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update post</button>
          </div>
    </form>
  </div>
</div>

<script>
  const title = document.querySelector('#title')
  const slug = document.querySelector('#slug')
  title.addEventListener('change', function() {
    fetch('/dashboard/wisata/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  })
  document.addEventListener('trix-file-accept', function (e) {
    e.preventDefault()
  })
  function previewImage() {
    const image = document.querySelector('#image')
    const imgPreview = document.querySelector('.preview-img')
    
    imgPreview.style.display = 'block'

    const oFReader = new FileReader()
    oFReader.readAsDataURL(image.files[0])

    oFReader.onload = function (oFREvent) {
      imgPreview.src = oFREvent.target.result
    }
  }
</script>

@endsection