@extends('dashboard.components.dashboard-layout')

@section('container')
  <h1 class="text-2xl">Post by, {{ auth()->user()->name }}</h1>

  @if (session()->has('success'))
    <div class="p-4 my-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
      <span class="font-medium">{{ session('success') }}</span>
    </div>
  @endif
  
  <div class="overflow-x-auto relative mt-5 border">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">
                    #
                </th>
                <th scope="col" class="py-3 px-6">
                    Title
                </th>
                <th scope="col" class="py-3 px-6">
                    Description
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($cities as $city)
            
          
            <tr class="bg-white border-b">
                <td class="py-4 px-6">
                  {{ $loop->iteration }}
                </td>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{ $city->title }}
                </th>
                <td class="py-4 px-6">
                    {{ $city->description }}
                </td>
                <td class="py-4 px-6">
                    <a href="/dashboard/city/{{ $city->id }}/edit" class="font-medium mr-2 border text-yellow-300 hover:underline">Edit</a>
                    <form class="inline" action="/dashboard/city/{{ $city->id }}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="font-medium mr-2 border text-pink-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

  <div class="my-4">
    {{ $cities->links() }}

  </div>

  <div class="my-6 flex justify-end">
    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5" href="/dashboard/city/create">Create Post</a>
  </div>

  

@endsection