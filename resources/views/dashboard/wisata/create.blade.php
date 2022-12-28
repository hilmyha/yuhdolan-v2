@extends('dashboard.components.dashboard-layout')

@section('container')
  
<div class="max-w-full grid format gap-12 bg-white sm:py-4 xl:py-6 ">
  <h1>Create New Post</h1>

  <div class="mt-5 md:col-span-2 md:mt-0">
    <form action="/dashboard/wisata" method="post">
      @csrf
        <div class="space-y-6 bg-white py-2 sm:p-6">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="title" id="title" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('title') }}">
            </div>
          </div>

          <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="slug" id="slug" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('slug') }}">
            </div>
          </div>
          <div>
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">Select your country</label>
            <select id="city" name="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              @foreach ($cities as $city)
                @if (old('city_id') == $city->id)
                  <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                @else
                  <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div>
            <label for="body" class="block mb-2 text-sm font-medium text-gray-700">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
          </div>
          <div>
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create post</button>
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
</script>

@endsection