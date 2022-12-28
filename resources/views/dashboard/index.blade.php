@extends('dashboard.components.dashboard-layout')

@section('container')
  <h1>Welcome, {{ auth()->user()->name }}</h1>

  
  {{-- <div class="overflow-x-auto relative mt-5 border">
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
                    Excerpt
                </th>
                <th scope="col" class="py-3 px-6">
                    Kota
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b">
                <td class="py-4 px-6">
                    1
                </td>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    Apple MacBook Pro 17"
                </th>
                <td class="py-4 px-6">
                    Sliver
                </td>
                <td class="py-4 px-6">
                    Laptop
                </td>
                <td class="py-4 px-6">
                    $2999
                </td>
                <td class="py-4 px-6">
                    <a href="#" class="font-medium mr-2 border text-green-500 hover:underline">Show</a>
                    <a href="#" class="font-medium mr-2 border text-yellow-300 hover:underline">Edit</a>
                    <a href="#" class="font-medium mr-2 border text-pink-500 hover:underline">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
  </div> --}}
  
@endsection