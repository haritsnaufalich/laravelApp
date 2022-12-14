@extends('layouts.main')

@section('container')

  <h1 class="mb-5 font-bold text-xl text-gray-800">My Books</h1>

  @if(session()->has('success'))
    <div class="p-4 mb-[24px] -mt-[10px] text-sm text-green-800 bg-green-200 rounded-lg" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <a href="/dashboard/books/create" class="bg-gray-800 hover:bg-gray-600 text-gray-200 py-2 px-4 rounded-md">Add Books</a>
  <div class="mt-6 overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
      <thead class="text-md uppercase bg-gray-600 text-gray-200">
        <tr>
          <th scope="col" class="py-4 px-6 text-center">
            #
          </th>
          <th scope="col" class="py-4 px-6 text-center">
            Title
          </th>
          <th scope="col" class="py-4 px-6 text-center">
            Genre
          </th>
          <th scope="col" class="py-4 px-6 text-center">
            Progress
          </th>
          <th scope="col" class="py-4 px-6 text-center">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
          <tr class="border-b bg-gray-800 border-gray-600">
            <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-gray-200 text-center">
              {{ $loop->iteration }}
            </th>
            <th class="py-4 px-6 text-gray-200">
              {{ $book->title }}
            </th>
            <td class="py-4 px-6 text-center text-gray-200">
              {{ $book->genre->name }}
            </td>
            <td class="py-4 px-6 text-center text-gray-200">
              {{ $book->progress }} / {{ $book->pages }}
            </td>
            <td class="py-4 px-6 justify-center flex">
              <span class="mx-1.5 font-medium text-green-400 hover:underline"><a href="/dashboard/books/{{ $book->slug }}"><i class="fa-regular fa-eye"></i></a></span>
              <span class="mx-1.5 font-medium text-orange-400 hover:underline"><a href="/dashboard/books/{{ $book->slug }}/edit"><i class="fa-solid fa-pen"></i></a></span>
              <form action="/dashboard/books/{{ $book->slug }}" method="POST">
                @method('delete')
                @csrf
                <button class="mx-1.5 font-medium text-red-600 hover:underline" onclick="return confirm('Are u Sure?')"><i class="fa-solid fa-trash-can"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection