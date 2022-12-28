@extends('dashboard.components.dashboard-layout')

@section('container')
  <h1>Post by, {{ auth()->user()->name }}</h1>

  
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
                    Kota
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($wisatas as $wisata)
            
          
            <tr class="bg-white border-b">
                <td class="py-4 px-6">
                  {{ $loop->iteration }}
                </td>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{ $wisata->title }}
                </th>
                <td class="py-4 px-6">
                    {{ $wisata->city->name }}
                </td>
                <td class="py-4 px-6">
                    <a href="/dashboard/wisata/{{ $wisata->id }}" class="font-medium mr-2 border text-green-500 hover:underline">Show</a>
                    <a href="/dashboard/wisata/{{ $wisata->id }}/edit" class="font-medium mr-2 border text-yellow-300 hover:underline">Edit</a>
                    {{-- <a href="#" class="font-medium mr-2 border text-pink-500 hover:underline">Delete</a> --}}
                    <form class="inline" action="/dashboard/wisata/{{ $wisata->id }}" method="post">
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
    {{ $wisatas->links() }}

  </div>

  <div class="my-6">
    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2" href="/dashboard/wisata/create">Create Post</a>
  </div>

  

@endsection