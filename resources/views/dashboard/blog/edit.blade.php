@extends('dashboard.components.dashboard-layout')

@section('container')
  
<div class="max-w-full grid format gap-12 bg-white sm:py-4 xl:py-6 ">
  <h1>Edit Post</h1>

  <div class="mt-5 md:col-span-2 md:mt-0">
    <form action="/dashboard/blog/{{ $blog->id }}" method="post">
      @method('put')
      @csrf
        <div class="space-y-6 bg-white py-2 sm:p-6">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="title" id="title" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('title', $blog->title) }}">
            </div>
          </div>

          <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="slug" id="slug" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('slug', $blog->slug) }}">
            </div>
          </div>

          <div>
            <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="excerpt" id="excerpt" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm peer invalid:focus:ring-pink-600 invalid:text-pink-600 invalid:focus:border-pink-600" required autofocus value="{{ old('excerpt', $blog->excerpt) }}">
            </div>
          </div>
          
          <div>
            <label for="body" class="block mb-2 text-sm font-medium text-gray-700">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $blog->body) }}">
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
    fetch('/dashboard/blog/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  })
  document.addEventListener('trix-file-accept', function (e) {
    e.preventDefault()
  })
</script>

@endsection